

<div class="content">

    <head>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="app.js"></script>
    </head>

    <body ng-app="myApp" ng-controller="CRUDController3">

    <div class="content" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card" >
                    <div class="card-header card-header-primary">
                        <h5 class="card-title ">edit Information
                        </h5>
                    </div>
                    <div class="model card-body" >
                        <form   enctype="multipart/form-data">
                            <input type="hidden" name="token" value="{{ csrf_token() }}">

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating ">
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control"  ng-model="info.firstName" name="firstName">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Second Name</label>
                                    <input type="text" class="form-control" name="secondName"  ng-model="info.secondName">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Third Name</label>
                                    <input type="text" class="form-control" name="thirdName" ng-model="info.thirdName">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Fourth Name</label>
                                    <input type="text" class="form-control" name="fourthName" ng-model= "info.fourthName" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" ng-model="info.email" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Id Number</label>
                                    <input type="number" class="form-control" name="idNum"  ng-model="info.idNum">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Functional Number</label>
                                    <input type="number" class="form-control" name="functionalNum" min="0" ng-model="info.functionalNum">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">specialization</label>

                                    <select class="form-control" name="specialization" ng-model="info.specialization">
                                        <option ng-repeat="x in specialization" value="{{x.id}}" >{{x.name}}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" ng-model="info.mobile" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" min="0" ng-model="info.phone">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">date Of Hiring</label>
                                    <input type="date" class="form-control" name="dateOfHiring"  ng-model="dateOfHiring">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label" for="dateBirth">date Birthay</label>
                                    <input type="date" class="form-control" name="dateBirth" ng-model="dateBirth">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label">Address</label>
                                    <input type="text" class="form-control" name="address" ng-model="info.address" >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label" for="socialStatus">Social Status</label>
                                    <input type="radio" name="socialStatus"  ng-model="info.socialStatus" value="married"> Married
                                    <input type="radio" name="socialStatus"  ng-model="info.socialStatus" value="single"> Single
                                    <input type="radio" name="socialStatus"  ng-model="info.socialStatus" value="divorced"> Divorced
                                    <input type="radio" name="socialStatus"  ng-model="info.socialStatus" value=" widow"> Widow
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label" for="gender">Gender: </label>
                                    <input type="radio" name="gender"  ng-model="info.gender" value="0"> Male
                                    <input type="radio" name="gender"  ng-model="info.gender" value="1"> Female
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label class="control-label" for="featured_image">Image</label>
                                    <br>
                                    <img ng-src="images/{{info.image}}">
                                    <br>
                                    <input type="file" name="featured_image" id="image2" ng-model="info.image">
                                </div><br>
                            </div>

                            <a href="#!display" class="btn btn-danger">Back</a>

                            <button type="button" class="btn btn-primary" ng-click="updateInfo()">update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</div>
