


<head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="app.js"></script>
</head>

<body ng-app="myApp" ng-controller="CRUDController4">

<div class="content" >
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card" >
                    <div class="card-header card-header-primary">
                        <h5 class="card-title ">edit University degrees
                        </h5>
                    </div>
                    <div class="model card-body" >
                        <form   enctype="multipart/form-data">
                            <input type="hidden" name="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">qualification</label>

                                    <select class="form-control" name="qualification" ng-model="degree.qualification">
                                        <option ng-repeat="x in qualification" value="{{x.id}}" >{{x.name}}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">specialization</label>

                                    <select class="form-control" name="specialization" ng-model="degree.specialization">
                                        <option ng-repeat="x in specialization" value="{{x.id}}" >{{x.name}}</option>

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">University</label>

                                    <select class="form-control" name="university" ng-model="degree.university">
                                        <option ng-repeat="x in university" value="{{x.id}}" >{{x.name}}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Date of specialization</label>
                                    <input type="date" class="form-control" name="date_of_specialization"  ng-model="date_of_specialization" >


                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">details</label>
                                    <textarea  class="form-control" name="details"  ng-model="degree.details" >

                                                </textarea>
                                </div>
                            </div>



                            <br>
                            <a href="#!display" class="btn btn-danger">Back</a>

                            <button type="submit" class="btn btn-primary" ng-click="updateDegrees()">update</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
