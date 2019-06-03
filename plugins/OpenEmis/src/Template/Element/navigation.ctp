<?php
$navigations = [];
if (isset($_navigations)) {
	$navigations = $_navigations;
}

$selectedLink = '';
if (isset($ControllerAction) && array_key_exists('selectedLink', $ControllerAction)) {
	$selectedLink = implode('-', $ControllerAction['selectedLink']);
}
$institutionId = $this->Session->read('Institution.Institutions.id');
$userId = $this->request->cookies['csrfToken'];

?>

<div class="left-menu">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php echo $this->Navigation->render($navigations) ?>
	</div>
	<div class="left-menu">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<ul id="nav-menu-1" class="nav nav-level-1 collapse in" role="tabpanel" data-level="1">
		<li><a  href="https://dashboard.sis.moe.gov.lk/dashboard/script/principal_dashboard.js?token=<?php echo $userId;?>&id=<?php echo $institutionId; ?>" id="Institutions-dashboard" target="_blank"><span><i class="fa kd-reports"></i></span><b>Dashboard</b></a></li>
		</ul>
	</div>
</div>

</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#accordion').on('show.bs.collapse', function (e) {
		var target = e.target;
		var level = $(target).attr('data-level');
		var id = $(target).attr('id');
		$('[data-level=' + level + ']').each(function() {
			if ($(this).attr('id') != id && $(this).hasClass('in') == true) {
				$(this).collapse('hide');
			}
		});
	})

	var action = '<?= $selectedLink ?>';
	$('#' + action).addClass('nav-active');
	var ul = $('#' + action).parents('ul');

	ul.each(function() {
		$(this).addClass('in');
		$(this).siblings('a.accordion-toggle').removeClass('collapsed'); 
	});
});
</script>
