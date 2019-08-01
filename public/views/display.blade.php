

<html  >

<head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
</head>
<body ng-app="myApp" ng-controller="CRUDController1">
<a href="#/!" class="btn btn-danger">Back</a>

<div class="container">

    <ul class="tabs">
        <li class="tab-link current" data-tab="tab-1">Information </li>
        <li class="tab-link" data-tab="tab-2">Kinship</li>
        <li class="tab-link" data-tab="tab-3">University degrees</li>
        <li class="tab-link" data-tab="tab-4">course</li>
        <li class="tab-link" data-tab="tab-5">experience</li>
    </ul>
        <div id="tab-1" class="tab-content current">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col -md-12" >

                        <br>

                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h5 class="card-title ">All information</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered " style="width:100%" >
                                        <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Second Name</th>
                                            <th>Third Name</th>
                                            <th>Fourth Name</th>
                                            <th>Email</th>
                                            <th>ID Number</th>
                                            <th>Functional Num</th>
                                            <th>Specialization</th>
                                            <th>social Status</th>
                                            <th>Gender </th>
                                            <th>Mobile</th>
                                            <th>Phone</th>
                                            <th>date Of Hiring</th>
                                            <th>date Of Birthay</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr  ng-repeat="(index,infos) in info">
                                            <td>{{index + 1}}</td>
                                            <td>{{infos.firstName}}</td>
                                            <td>{{infos.secondName}}</td>
                                            <td>{{infos.thirdName}}</td>
                                            <td>{{infos.fourthName}}</td>
                                            <td>{{infos.email}}</td>
                                            <td>{{infos.idNum}}</td>
                                            <td>{{infos.functionalNum}}</td>
                                            <td ng-if="infos.specialization ==1" >IT</td>
                                            <td ng-if="infos.specialization ==2" >Doctor</td>
                                            <td ng-if="infos.specialization ==3" >education</td>
                                            <td ng-if="infos.specialization ==4" >Sciences</td>
                                            <td ng-if="infos.specialization ==5" >engineering</td>
                                            <td>{{infos.socialStatus}}</td>
                                            <td ng-if="infos.gender ==0" >male</td>
                                            <td ng-if="infos.gender ==1" >female</td>
                                            <td>{{infos.mobile}}</td>
                                            <td>{{infos.phone}}</td>
                                            <td>{{infos.dateOfHiring}}</td>
                                            <td>{{infos.dateBirth}}</td>
                                            <td>{{infos.address}}</td>
                                            <td>
                                                <img src ="images/{{infos.image}}" height="100" width="100"/>
                                            </td>

                                            <td>
                                                <button ng-click="confirmDelete_info(infos.id)" type="button" class="btn btn-danger btn-sm  deleteClass">

                                                    delete</button>
                                                <a href="#!editInfo/{{infos.id}}" type="button" class="btn btn-info btn-sm">

                                                    edit</a>
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>

                                </div>
                            </div>
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
            <div class="col -md-12" >

                <br>

                <div class="card">
                    <div class="card-header card-header-primary">
                        <h5 class="card-title ">All Kinship</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered " style="width:100%" >
                                <thead class="thead-light">
                                <tr>
                                    <th>Id</th>
                                    <th>FirstName</th>
                                    <th>SecondName</th>
                                    <th>ThirdName</th>
                                    <th>FourthName</th>
                                    <th>relative_relation </th>
                                    <th>Date_of_Birth</th>
                                    <th>Social_status</th>
                                    <th>Study</th>
                                    <th>Work</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr ng-repeat ="(index , kinships) in kinship" >
                                    <td>{{ index + 1 }}</td>
                                    <td>{{kinships.FirstName }}</td>
                                    <td>{{kinships.SecondName }}</td>
                                    <td>{{kinships.ThirdName }}</td>
                                    <td>{{kinships.FourthName }}</td>

                                    <td ng-if="kinships.relative_relation ==1" >father</td>
                                    <td ng-if="kinships.relative_relation ==2" >mother</td>
                                    <td ng-if="kinships.relative_relation ==3" >Grandpa</td>
                                    <td ng-if="kinships.relative_relation ==4" >Grandma</td>
                                    <td ng-if="kinships.relative_relation ==5" >brother</td>
                                    <td ng-if="kinships.relative_relation ==6" >sister</td>
                                    <td ng-if="kinships.relative_relation ==7" >Aunt</td>
                                    <td ng-if="kinships.relative_relation ==8" >uncle</td>


                                    <td>{{kinships.Date_of_Birth}}</td>
                                    <td>{{kinships.Social_status}}</td>

                                    <td ng-if="kinships.Study ==0" >false</td>
                                    <td ng-if="kinships.Study ==1" >true</td>

                                    <td ng-if="kinships.work ==0" >false</td>
                                    <td ng-if="kinships.work ==1" >true</td>

                                    <td>{{kinships.image}}</td>


                                    <td>
                                        <button ng-click="confirmDelete(kinships.id)" type="button" class="btn btn-danger btn-sm  deleteClass">

                                            delete</button></td>
                                    <td>
                                        <a href="#!editkinship/{{kinships.id}}/{{kinships.employee_id}}" type="button" class="btn btn-info btn-sm">

                                            edit</a>
                                    </td>


                                </tr>

                                </tbody>

                            </table>

                        </div>
                    </div>
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
                <div class="col -md-12" >

                    <br>

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="card-title ">All University degrees</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " style="width:100%" >
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>qualification</th>
                                        <th>specialization</th>
                                        <th>University</th>
                                        <th>Date of specialization</th>
                                        <th>details </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr ng-repeat ="(index , uni) in degree" >
                                        <td>{{ index + 1 }}</td>

                                        <td ng-if="uni.qualification ==1" >BA</td>
                                        <td ng-if="uni.qualification ==2" >M.A.</td>
                                        <td ng-if="uni.qualification ==3" >Ph.D.</td>
                                        <td ng-if="uni.qualification ==4" >diploma</td>
                                        <td ng-if="uni.qualification ==5" >Prof</td>
                                        <td ng-if="uni.specialization ==1" >IT</td>
                                        <td ng-if="uni.specialization ==2" >Doctor</td>
                                        <td ng-if="uni.specialization ==3" >education</td>
                                        <td ng-if="uni.specialization ==4" >Sciences</td>
                                        <td ng-if="uni.specialization ==5" >engineering</td>
                                        <td ng-if="uni.university ==1" >Islamic</td>
                                        <td ng-if="uni.university ==2" >Al_Azhar</td>
                                        <td ng-if="uni.university ==3" >Al_Aqsa</td>
                                        <td ng-if="uni.university ==4" >Gaza</td>

                                        <td>{{uni.date_of_specialization }}</td>
                                        <td>{{uni.details }}</td>


                                        <td>
                                            <button ng-click="confirmDelete_degree(uni.id)" type="button" class="btn btn-danger btn-sm  deleteClass">
delete</button>
                                            <a href="#!editDegree/{{uni.id}}/{{uni.employee_id}}" type="button" class="btn btn-info btn-sm">

                                                edit</a>
                                        </td>


                                    </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
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
                <div class="col -md-12" >

                    <br>

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="card-title ">All Courses</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " style="width:100%" >
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Course Name</th>
                                        <th>place</th>
                                        <th>Start_Date</th>
                                        <th>Expiry_date</th>
                                        <th>details </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr ng-repeat ="(index , courses) in course" >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{courses.Course_Name }}</td>
                                        <td>{{courses.place }}</td>
                                        <td>{{courses.Start_Date }}</td>

                                        <td>{{courses.Expiry_date }}</td>
                                        <td>{{courses.details }}</td>


                                        <td>
                                            <button ng-click="confirmDelete_course(courses.id)" type="button" class="btn btn-danger btn-sm  deleteClass">

                                              delete</button>
                                            <a href="#!editCourse/{{courses.id}}/{{courses.employee_id}}" type="button" class="btn btn-info btn-sm">

                                                edit</a>
                                        </td>


                                    </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
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
                <div class="col -md-12" >

                    <br>

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="card-title ">All experiences</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " style="width:100%" >
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Work place</th>
                                        <th>Job_title</th>
                                        <th>Start_Date</th>
                                        <th>Expiry_date</th>
                                        <th>Salary </th>
                                        <th>coin </th>

                                        <th>details </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr ng-repeat ="(index , experiences) in experience" >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{experiences.Workplace }}</td>
                                        <td>{{experiences.Job_title }}</td>
                                        <td>{{experiences.Start_Date }}</td>

                                        <td>{{experiences.Expiry_date }}</td>
                                        <td>{{experiences.Salary }}</td>
                                        <td>{{experiences.coin }}</td>

                                        <td>{{experiences.details }}</td>


                                        <td>
                                            <button ng-click="confirmDelete_experience(experiences.id)" type="button" class="btn btn-danger btn-sm  deleteClass">

                                                delete</button>
                                            <a href="#!editExpereance/{{experiences.id}}/{{experiences.employee_id}}" type="button" class="btn btn-info btn-sm">

                                                edit</a>
                                        </td>


                                    </tr>

                                    </tbody>

                                </table>

                            </div>
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


</html>






