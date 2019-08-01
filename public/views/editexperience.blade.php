


<head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="app.js"></script>
</head>

<body ng-app="myApp" ng-controller="CRUDController6">

<div class="content" >
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="card" >
                        <div class="card-header card-header-primary">
                            <h5 class="card-title ">Add new experience
                            </h5>
                        </div>
                        <div class="model card-body" >
                            <form   enctype="multipart/form-data">
                                <input type="hidden" name="token" value="{{ csrf_token() }}">

                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating" >
                                        <label class="control-label">Work place</label>
                                        <input type="text" class="form-control"  name="Workplace" ng-model="experience.Workplace">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating" >
                                        <label class="control-label">Job title</label>
                                        <input type="text" class="form-control"  name="Job_title" ng-model="experience.Job_title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">Salary</label>
                                        <input type="number" class="form-control" name="Salary"  ng-model="experience.Salary">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">coin</label>

                                        <select class="form-control" name="coin" ng-model="experience.coin">
                                            <option ng-repeat="x in coin" value="{{x.id}}" >{{x.name}}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">Start Date</label>
                                        <input type="date" class="form-control" name="Start_Date"  ng-model="Start_Date" >


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">Expiry_date</label>
                                        <input type="date" class="form-control" name="Expiry_date"  ng-model="Expiry_date" >


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">details</label>
                                        <textarea  class="form-control" name="details"  ng-model="experience.details" >

                                                </textarea>
                                    </div>
                                </div>



                                <br>
                                <a href="#!display" class="btn btn-danger">Back</a>

                                <button type="submit" class="btn btn-primary" ng-click="updateExperience()">update</button>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
