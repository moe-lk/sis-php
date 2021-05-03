<h3><?= __('Workbench'); ?></h3>
<div class="row dashboard-container">
	<div id="workbench">
		<div class="dashboard-content margin-top-10">
			<table class="table table-lined" ng-show="(DashboardController.workbenchItems && DashboardController.workbenchItems.length == 0) || (!DashboardController.workbenchItems)">
				<tbody class="table_body">
					<tr ng-if="!DashboardController.workbenchItems" ng-cloak>
						<td><?= __('No Workbench Data'); ?></td>
					</tr>
					<tr ng-if="DashboardController.workbenchItems && DashboardController.workbenchItems.length == 0">
						<td><?= __('Loading'); ?> ...</td>
					</tr>
				</tbody>
			</table>
			<div ng-if="DashboardController.workbenchItems && DashboardController.workbenchItems.length > 0" ng-cloak>
				<ul class="list-group">
					<li class="list-group-item" ng-show="item.total > 0" ng-repeat="item in DashboardController.workbenchItems | orderBy:'order'" ng-click="DashboardController.onChangeModel(item)">
						<div class="list-icon">
							<i class="fa fa-table"></i>
							<div class="badge btn-red badge-right">{{item.total}}</div>
						</div>
						<div class="list-text">
							<p>{{item.name}}</p>
						</div>
						<i class="chervon"></i>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="row dashboard-container">
	<table class="table table-lined">
		<tbody class="table_body">
			<tr ng-clock>
				<!-- <td>
					<div class="list-text">
						<h4>Introduction</h4>
					</div>
					<iframe width="256" src="https://www.youtube.com/embed/2B2zrrMWU4g?rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</td> -->
				<td>
					<div class="list-text">
						<h4>Introduction to Promotion</h4>
					</div>
					<iframe width="256" src="https://www.youtube.com/embed/TeYEeqSd-iI?rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</td>
				<td>
					<div class="list-text">
						<h4>Manual Pool Promotion</h4>
					</div>
					<iframe width="256" src="https://www.youtube.com/embed/G-eGQZLKr18?rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</td>
				<td>
					<div class="list-text">
						<h4>Assigning Classes</h4>
					</div>
					<iframe width="256" src="https://www.youtube.com/embed/AsmMe8gFPes?rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</td>
				<td>
					<div class="list-text">
						<h4>Demoting a student</h4>
					</div>
					<iframe width="256" src="https://www.youtube.com/embed/EyWrnPpKBAk?rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</td>
			</tr>
		</tbody>
	</table>
</div>