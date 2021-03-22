<link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminty\files\assets\css/profileheader/plugins-bfe8fe4bf0.css"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminty\files\assets\css/profileheader/bootstrap-6c1773bf8c.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets\adminty\files\assets\css/profileheader/trumbowyg-71fdf6933d.css">
<div class="clearfix page-container">
    <div data-ui-view="" class="ng-scope">
		<div class="col-lg-12 col-md-12 col-sm-12 sub-page-container ng-scope">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 employee-profile-container">
				<div class="profile-picture-container">
					
				</div>
				<div class="row employee-header">
					<div class="col-sm-12 clear-right-padding">
						<div class="employee-details right-padding-10">
							<div class="employee-options-container col-lg-12 clear-left-padding">
								<h1 class="display-name ng-binding">Prajapati Mahendra Kantibhai </h1>
									<span class="label bg-accent-success horizontal-margin-left display-inline clock-in-status ng-scope" data-ng-if="model.clockInDetails.hasLogs &amp;&amp; model.clockInDetails.clockInStatus == 0 &amp;&amp; (model.clockInDetails.manualClockinType == 0 || model.clockInDetails.manualClockinType != model.clockInDetails.currentClockinType)">IN</span>

							</div>
							<p class="current-city ng-binding ng-scope" data-ng-if="vm.publicProfile.orgLocationName"><i class="icon-location"></i> Ahmedabad</p>
						   <p class="email ng-scope" data-ng-if="vm.publicProfile.email"><i class="icon-envelop2"></i><a href="mailto:mahendra@nuwaveindia.net" class="ng-binding">mahendra@nuwaveindia.net</a></p>
							
						</div>
						<div class="col-sm-12 clear-left-padding">
							<div class="col-sm-12 clear-left-padding">
								<hr class="col-sm-12 clear-side-padding">
							</div>
						</div>
					</div>
				</div>
				<div class="employee-subnav">
					<ul class="sub-nav navbar-nav public-profile-subnav">
						<li data-ng-if="vm.publicProfile.jobTitle" class="ng-scope">
							<span class="detail-label">Job Title</span>
							<span class="detail-value">
							<span data-ng-if="vm.publicProfile.jobTitle" ng-bind-html="vm.publicProfile.jobTitle" class="ng-binding ng-scope">Software Engineer</span>
								
							</span>
						</li>
						<li data-ng-if="vm.publicProfile.departmentName" class="ng-scope">
							<span class="detail-label">Department</span>
							<span class="detail-value text-transform-none ng-binding">Development</span>
						</li>
						<li data-ng-if="vm.publicProfile.reportingManager" class="ng-scope">
							<span class="detail-label">Reporting to</span>
							<span class="detail-value">
							   <a data-ng-if="vm.publicProfile.reportingTo &gt; 0" href="https://vindaloo.keka.com/old/#/employee/152345/summary" target="_blank" class="ng-binding ng-scope">MEHULKUMAR S PATEL</a>
							</span>
						</li>
						<li data-ng-if="vm.publicProfile.employeeNumber" class="ng-scope">
							<span class="detail-label">Employee Number</span>
							<span class="detail-value detail-value-emp-no ng-binding">0062</span>
						</li>
							
					</ul>
				</div>
				<div class="employee-navbar">
					<div id="toolbar" class="sub-nav sub-navbar-default">
						<ul class="sub-nav navbar-nav ng-scope" data-ng-if="&#39;me&#39; | includedByState">
							<li ui-sref-active="active" class="active"><a ui-sref="me.about" href="#">ABOUT</a></li>
							
							<li ui-sref-active="active"><a ui-sref="me.profile" href="#">Profile</a></li>
							<li ui-sref-active="active"><a href="#">JOB</a></li>
							<li ui-sref-active="active"><a href="#">DOCUMENTS</a></li>
							<li ui-sref-active="active"><a href="#">ASSETS</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>