<?php use_helper('ysJQueryRevolutions') ?>
<?php use_helper('ysJQueryUICore'); ?>
<?php ui_add_effects_support('blind')?>

<h3>Panel</h3>
<div>
  <?php echo ui_init_content_panel()?>
  This is a content panel
  <?php echo ui_end_content_panel()?>
</div>
<br>
<div>
<?php echo ui_init_title() ?>
  This is the title
<?php echo ui_end_title() ?>
</div>
<br>
<?php echo ui_init_content()?>
  <p>This is the content</p>
<?php echo ui_end_content()?>

<br>
<?php echo ui_init_content()?>
<!--no content => spacer!-->
<?php echo ui_end_content()?>
<br>

<h3>Joining the functionalities</h3>

<?php echo ui_init_title() ?>
  This is the title
<?php echo ui_end_title() ?>
<?php echo ui_init_content()?>
  <p>This is the content</p>
<?php echo ui_end_content()?>


<br>
<?php echo ui_init_content()?>
<!--no content => spacer!-->
<?php echo ui_end_content()?>
<br>

<?php echo ui_init_content_panel()?>
  <?php echo ui_init_title(array('icon' => 'newwin')) ?>
    This is the title
  <?php echo ui_end_title() ?>
  
  <?php echo ui_init_content()?>
    <p>This is the content panel with ui-icon</p>
  <?php echo ui_end_content()?>
<?php echo ui_end_content_panel()?>


<br>
<?php echo ui_init_content()?>
<!--no content => spacer!-->
<?php echo ui_end_content()?>
<br>

<?php echo ui_init_content_panel(array('class' => 'ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable ui-resizable'))?>
    <?php echo ui_init_title(array(
        'icon' => 'newwin',
        'class' => 'ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix',
        'style' => 'top: 5px; left: 30px; height:50px') ) ?>
      This is the title
    <?php echo ui_end_title() ?>
    <?php echo ui_init_content()?>
      <p>This is the content panel with ui-icon, style and class definitions</p>
    <?php echo ui_end_content()?>
<?php echo ui_end_content_panel()?>

<br>
<?php echo ui_init_content()?>
<!--no content => spacer!-->
<?php echo ui_end_content()?>
<br>

<?php echo ui_init_content_panel()?>
  <?php echo ui_init_title(array('image' => image_tag('http://jqueryui.com/demos/datepicker/images/calendar.gif'))) ?>
    This is the title
  <?php echo ui_end_title() ?>

  <?php echo ui_init_content()?>
    <p>This is the content panel with image</p>
  <?php echo ui_end_content()?>
<?php echo ui_end_content_panel()?>

<br>
<?php echo ui_init_content()?>
<!--no content => spacer!-->
<?php echo ui_end_content()?>
<br>
<?php echo ui_init_content_panel()?>
    <?php echo ui_init_title(array(
                'icon' => 'newwin' ,
                'id' => 'myTitle',
                'style' => 'cursor:pointer')) ?>
      This is the title
    <?php echo ui_end_title() ?>

    <?php echo ui_init_content(array('id' => 'miPanel'))?>
      <p>This is the collapsible content panel... see the js code</p>
    <?php echo ui_end_content()?>
<?php echo ui_end_content_panel()?>

	<script type="text/javascript">
    // the js code
	$(function() {
    $("#myTitle").click(function() {
			$("#miPanel").toggle('blind');
			return false;
		});
	});
	</script>

  <br><br>
  2 content-panels

<?php echo ui_init_content_panel()?>
      <?php echo ui_init_title(array('icon' => 'newwin')) ?>
        This is the title
      <?php echo ui_end_title() ?>

      <?php echo ui_init_content()?>
        <p>This is the content panel with icon</p>
      <?php echo ui_end_content()?>
      <?php echo ui_init_title(array('icon' => 'newwin')) ?>
        This is the title
      <?php echo ui_end_title() ?>

      <?php echo ui_init_content()?>
        <p>This is the content panel with icon</p>
      <?php echo ui_end_content()?>
<?php echo ui_end_content_panel()?>


<br><br>
  2 content-panels <br>
  in-line. View the configuration!.
<br>
<?php echo ui_init_content_panel(array('style'=> 'float:left; width:45%; margin:2px;'))?>
      <?php echo ui_init_title(array('icon' => 'newwin')) ?>
        This is the title
      <?php echo ui_end_title() ?>

      <?php echo ui_init_content()?>
        <p>This is the content panel with icon</p>
      <?php echo ui_end_content()?>
<?php echo ui_end_content_panel()?>

<?php echo ui_init_content_panel(array('style'=> 'float:left; width:45%; margin:2px;'))?>
      <?php echo ui_init_title(array('icon' => 'newwin')) ?>
        This is the title
      <?php echo ui_end_title() ?>

      <?php echo ui_init_content()?>
        <p>This is the content panel with icon</p>
      <?php echo ui_end_content()?>
 <?php echo ui_end_content_panel()?>

