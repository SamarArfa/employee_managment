


<head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="app.js"></script>
</head>

<body ng-app="myApp" ng-controller="CRUDController5">

<div class="content" >
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="card" >
                        <div class="card-header card-header-primary">
                            <h5 class="card-title ">Add new course
                            </h5>
                        </div>
                        <div class="model card-body" >
                            <form   enctype="multipart/form-data">
                                <input type="hidden" name="token" value="{{ csrf_token() }}">

                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">Course_Name</label>
                                        <input type="text" class="form-control" name="Course_Name" ng-model="course.Course_Name" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating">
                                        <label class="control-label">place</label>
                                        <input type="text" class="form-control" name="place" ng-model="course.place" >
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
                                        <textarea  class="form-control" name="details"  ng-model="course.details" >

                                                </textarea>
                                    </div>
                                </div>



                                <br>
                                <a href="#!display" class="btn btn-danger">Back</a>

                                <button type="submit" class="btn btn-primary" ng-click="updateCourse()">update</button>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>