
<!DOCTYPE html>
<html ng-app="myApp">
  <head>
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<meta http-equiv="Access-Control-Allow-Headers" content="accept, content-type">
	<title>IDBO::Suggest Report</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/colResize.js"></script>
	<style>
	td{
		white-space:nowrap;
		max-width:500px;
		max-height:200px;
		overflow:hidden;
		vertical-align:middle !important;
	}
	textarea {
		font-size: 14px !important;
		height: 135px !important;
		overflow: auto !important;
		resize: none !important;
	}

	</style>
  </head>
  <body style="padding-top:50px">
	<!-- fixed navbar -->
		
 	<!-- Dynamic container -->
		<div class="container-fluid" ng-controller="IssueController">
			<div class= "col-xs-6 col-sm-8">
				<table class="sample table table-hover table-bordered table-condensed" width="100%">
					<thead>
						<th width="5%" class="text-center">Sl No</th>
						<th width="10%" class="text-center">SectionGroup</th>
						<th width="10%" class="text-center">SectionName</th>
						<th width="30%" class="text-center">description</th>
						<th width="10%" class="text-center">Priority</th>
						<th width="10%" class="text-center">Status</th>
						<th width="10%" class="text-center">CreatedBy</th>
						<th width="10%" class="text-center">CreatedDate</th>
						<th width="5%" class="text-center">Action</th>
					</thead>
					<tbody ng-repeat="issue in listOfIssues" >
					<tr ng-click="selectIssue(issue)" ng-class="{info: issue.ID == selectedIssueId}" style="cursor:pointer">
						<td class="text-right">{{issue.SlNo}}</td>
						<td>{{issue.SectionGroupName}}</td>
						<td>{{issue.SectionName}}</td>
						<td>{{issue.Description}}</td>
						<td class="text-center">{{issue.Priority | PriorityFilter}}</td>
						<td class="text-center">{{issue.RecordStatus | statusFilter}}</td>
						<td class="text-center">{{issue.CreatedByName}}</td>
						<td class="text-center">{{issue.Created | date}}</td>
						<td class="text-center">
							<!--<button type="button" class="btn btn-link btn-sm" ng-click="editIssue(issue)">Edit</button>-->
							<button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="issue">Edit</button>
						</td>
					</tr>
					<tr ng-show="issue.ID == selectedIssueId">
						<td colspan="9">
							<textarea cols="80" rows="24" class="form-control" readonly="" name="description">{{issue.Description}}</textarea>
						</td>
						
					</tr>
					</tbody>
				</table>
			</div>
			<div class="col-xs-6 col-sm-4">
				<table class="sample table table-hover table-bordered table-condensed">
					<thead>
						<th width="50%" class="text-center">Comments</th>
						<th width="25%" class="text-center">CreatedBy</th>
						<th width="25%" class="text-center">CreatedDate</th>
					</thead>
					<tbody ng-repeat="comment in listOfComments">
						<tr data-toggle="collapse" data-target="#{{comment.ID}}" class="accordion-toggle">
							<td>{{comment.Comments}}</td>
							<td>{{comment.CreatedBy}}</td>
							<td>{{comment.Created | date}}</td>
						</tr>
						<tr>
							<td colspan="3">
								<div class="accordion-body collapse" id="{{comment.ID}}">
									<textarea cols="80" rows="24" class="form-control" readonly="" name="description">{{comment.Comments}}</textarea>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		 
		<modal-template></modal-template>
	</div>
	<script type="text/javascript">
		var x = {1:"low",2:"medium",3:"critical"};
		var y = {firstName:"John", lastName:"Doe", age:50, eyeColor:"blue"};
		var number = "/Date(1427444788747)/".replace(/[^0-9]/g, '');
		var d = new Date(number);
		console.log(number + d.getDate());
		console.log(x[1]);
		
		$(document).ready(function(){
			$(".sample").colResizable({liveDrag:true});
			/*$('#exampleModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget);
			  var recipient = button.data('whatever');
			  console.log(recipient);
			  var modal = $(this);
			  modal.find('.modal-title').text('New message to ' + recipient);
			  modal.find('.modal-body input').val(recipient);
			});*/

		});

	</script>
	<script type="text/javascript" src="js/angular.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
  
</html>
  
