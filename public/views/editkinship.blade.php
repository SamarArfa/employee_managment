<html>
<head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="app.js"></script>
</head>

<body ng-app="myApp" ng-controller="CRUDController2">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card" >
                    <div class="card-header card-header-primary">
                        <h5 class="card-title ">edit Kinship</h5>
                    </div>
                    <div class="model card-body" >
                        <form   enctype="multipart/form-data">
                            <input type="hidden" name="token" value="{{ csrf_token() }}">

                            <div class="col-md-12" id="add_new_kinship">
                                <div class="form-group bmd-label-floating" >
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control"  name="FirstName" ng-model="kinship.FirstName">



                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Second Name</label>
                                    <input type="text" class="form-control" name="SecondName" ng-model="kinship.SecondName"
                                    >


                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Third Name</label>
                                    <input type="text" class="form-control" name="ThirdName" ng-model="kinship.ThirdName">


                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Forth Name</label>
                                    <input type="text" class="form-control" name="FourthName" ng-model="kinship.FourthName">

                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">relative relation</label>

                                    <select class="form-control" name="relative_relation" ng-model="kinship.relative_relation">
                                        <option ng-repeat="x in relative" value="{{x.id}}" >{{x.name}}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="Date_of_Birth"  ng-model="Date_of_Birth" >


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="radio-inline">  Social status</label>

                                <br>
                                <input type="radio" id="smt-fld-1-2"  value="single" name="Social_status"
                                       ng-model="kinship.Social_status">single
                                <br>
                                <input type="radio" id="smt-fld-1-3" value="Married" name="Social_status"
                                       ng-model="kinship.Social_status"> Married
                                <br>
                                <input type="radio" id="smt-fld-1-3" value="Divorced" name="Social_status"
                                       ng-model="kinship.Social_status">Divorced


                            </div>

                            <div class="form-group">
                                <label class="radio-inline">Does he Study ?</label>
                                <br>
                                <input type="radio" id="smt-fld-1-2" value="1"  name="Study" ng-model="kinship.Study">Yes

                                <br>
                                <input type="radio" id="smt-fld-1-3" value="0" name="Study" ng-model="kinship.Study">No


                            </div>

                            <div class="form-group">
                                <label class="radio-inline">Does he work ?</label>
                                <br>
                                <input type="radio" id="smt-fld-1-2"  value="1" name="work" ng-model="kinship.work">Yes
                                <br>
                                <input type="radio" id="smt-fld-1-3" value="0" name="work" ng-model="kinship.work">No


                            </div>

                            <div class="col-md-12">
                                <br >

                                <label class="control-label">Image</label>
                                <img ng-src="images/{{kinship.image}}">
<br>
                                <input type="file" name="image" id="image3" ng-model="kinship.image">


                                <br>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary" ng-click="updatekinship()">update</button>
                            <a href="#!display" class="btn btn-danger">Back</a>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
