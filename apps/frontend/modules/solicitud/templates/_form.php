<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_stylesheet('ui.jqgrid.css') ?>
<?php use_javascript('grid.locale-sp.js') ?>
<?php use_javascript('jquery.jqGrid.min.js') ?>
<table id="list"></table>
<div id="pager"></div>
<a href="javascript:void(0)" id="addbtn">Agregar Artículo(s)</a>
<br><br>
<form action="<?php echo url_for('solicitud/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<?php $counter = 0 ?>
<?php $name = 'Articulos' ?>
<table width="80%">
    <tfoot>
      <tr>
        <td colspan="2">
            <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('solicitud/index') ?>">Listado de solicitudes</a>
          <?php if (!$form->getObject()->isNew() && $can_delete != 0): ?>
            &nbsp;<?php echo link_to('Eliminar', 'solicitud/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <th><?php echo $form['departamento_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['departamento_id']->renderError() ?>
          <?php echo $form['departamento_id'] ?>
        </td>
      </tr>
      <tr>
          <th<?php echo $form['Articulos']->renderLabel() ?></th>
          <td>
              <table>
                  <tbody id="detalles_container">
                      <?php if(!$form->getObject()->isNew()) :?>
                      <?php foreach ($form[$name] as $key => $field): ?>
                        <?php echo include_partial('solicitud/addDetalleForm', array('field' => $field, 'num' => ++$counter)) ?>
                      <?php endforeach; ?>
                      <?php endif; ?>
                  </tbody>
              </table>
          </td>
      </tr>
    </tbody>
  </table>
</form>
<script type="text/javascript">
    var cnt = <?php echo $counter ?>;
    jQuery("#list").jqGrid({
        url: '<?php echo url_for('articulos/GetJsonArticulos') ?>',
        datatype: "json",
        height: "auto",
        colNames:['Id','Descripción', 'Presentación', 'Categoría'],
        colModel:[
            {name:'id',index:'id', width:60, sorttype:"int", search:false},
            {name:'descripcion',index:'descripcion', width:200},
            {name:'marca',index:'marca', width:200},
            {name:'categoria',index:'categoria', width:200}
        ],
        rowNum: 10,
        rowList: [10,20],
        pager: '#pager',
        sortname: 'id',
        viewrecords: true,
        sortorder: "asc",
        multiselect: true
    });

    jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false});
    $.extend($.jgrid.search,{sopt:['cn']});

    function addDetalle(num, art_id)
    {
        var r = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('solicitud/addDetalleForm')?>'+'<?php echo ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num+'&art_id='+art_id,
            async: false
        }).responseText;
        return r;
    };

    function delDetalle(num)
    {
        document.getElementById('detalles_container').removeChild(document.getElementById('detalle_'+num));
        cnt = cnt - 1;
    };

    jQuery("#addbtn").click( function() {
        var s;
        var idArray = Array();
        s = jQuery("#list").jqGrid('getGridParam','selarrrow');
        ids = new String(s);
        idArray = ids.split(",");
        idArray.forEach(function(item) {
            jQuery("#detalles_container").append(addDetalle(cnt, item));
            cnt = cnt + 1;
        });
    });
</script>