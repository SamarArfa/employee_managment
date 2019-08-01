<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="app.js"></script>
    <style>
        body{
            margin-top: 100px;
            font-family: 'Trebuchet MS', serif;
            line-height: 1.6
        }
        .container{
            width: 800px;
            margin: 0 auto;
        }



        ul.tabs{
            margin: 0px;
            padding: 0px;
            list-style: none;
        }
        ul.tabs li{
            background: none;
            color: #222;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
        }

        ul.tabs li.current{
            background: #ededed;
            color: #222;
        }

        .tab-content{
            display: none;
            background: #ededed;
            padding: 15px;
        }

        .tab-content.current{
            display: inherit;
        }
    </style>
</head>

<body ng-app="myApp" ng-controller="CRUDController1">
<a href="#!display" class="btn btn-info ">display data</a>
<div class="container">

    <ul class="tabs">
        <li class="tab-link current" data-tab="tab-1">Information
            </li>
        <li class="tab-link" data-tab="tab-2">Kinship</li>
        <li class="tab-link" data-tab="tab-3">University degrees</li>
        <li class="tab-link" data-tab="tab-4">course</li>
        <li class="tab-link" data-tab="tab-5">experience</li>
    </ul>

    <div id="tab-1" class="tab-content current">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="card" >
                            <div class="card-header card-header-primary">
                                <h5 class="card-title ">Add new Information
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
                                    <input type="date" class="form-control" name="dateOfHiring"  ng-model="info.dateOfHiring">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group bmd-label-floating">
                                    <label class="control-label" for="dateBirth">date Birthay</label>
                                    <input type="date" class="form-control" name="dateBirth" ng-model="info.dateBirth">
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
                                    <input type="file" name="featured_image"  ng-model="info.image" accept="image">
                                </div><br>
                            </div>


                            <button type="button" class="btn btn-primary" ng-click="addinfo()">Save</button>

                        </form>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-2" class="tab-content">

    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="card" >
                            <div class="card-header card-header-primary">
                                <h5 class="card-title ">Add new Kinship</h5>
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
                                            <input type="date" class="form-control" name="Date_of_Birth"  ng-model="kinship.Date_of_Birth" >


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
                                        <input type="file" name="image" accept="image" ng-model="kinship.image">


                                        <br>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary" ng-click="addkinship()">Save</button>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div id="tab-3" class="tab-content">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="card" >
                                <div class="card-header card-header-primary">
                                    <h5 class="card-title ">Add new University degrees
                                    </h5>
                                </div>
                                <div class="model card-body" >
                                    <form   enctype="multipart/form-data">
                                        <input type="hidden" name="token" value="{{ csrf_token() }}">

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
                                                <input type="date" class="form-control" name="date_of_specialization"  ng-model="degree.date_of_specialization" >


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

                                        <button type="submit" class="btn btn-primary" ng-click="adddegree()">Save</button>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="tab-4" class="tab-content">
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
                                            <input type="date" class="form-control" name="Start_Date"  ng-model="course.Start_Date" >


                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="control-label">Expiry_date</label>
                                            <input type="date" class="form-control" name="Expiry_date"  ng-model="course.Expiry_date" >


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

                                    <button type="submit" class="btn btn-primary" ng-click="addcourse()">Save</button>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-5" class="tab-content">
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
                                            <input type="number" class="form-control" name="Salary" min="0" ng-model="experience.Salary">
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
                                            <input type="date" class="form-control" name="Start_Date"  ng-model="experience.Start_Date" >


                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group bmd-label-floating">
                                            <label class="control-label">Expiry_date</label>
                                            <input type="date" class="form-control" name="Expiry_date"  ng-model="experience.Expiry_date" >


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

                                    <button type="submit" class="btn btn-primary" ng-click="addexperience()">Save</button>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
    <script>
        $(document).ready(function(){

            $('ul.tabs li').click(function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            })

        })
    </script>
</body>