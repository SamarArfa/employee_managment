


var myApp =angular.module("myApp",["ngRoute"]);


myApp.config(function($routeProvider) {
    $routeProvider
        .when("/", {
        templateUrl : "views/index.blade.php",
            controller:"CRUDController1"
        })

  .when("/display", {
        templateUrl : "views/display.blade.php",
        controller:"CRUDController1"
    })
        .when("/editkinship/:id/:employee_id", {
            templateUrl : "views/editkinship.blade.php",
            controller:"CRUDController2"
        })
         .when("/editInfo/:id", {
        templateUrl : "views/editInformation.blade.php",
        controller:"CRUDController3"
    }) .when("/editDegree/:id/:employee_id", {
        templateUrl : "views/editdegrees.blade.php",
        controller:"CRUDController4"
    }) .when("/editCourse/:id/:employee_id", {
        templateUrl : "views/editcourse.blade.php",
        controller:"CRUDController5"
    }).when("/editExpereance/:id/:employee_id", {
        templateUrl : "views/editexperience.blade.php",
        controller:"CRUDController6"
    })
        .otherwise({
            template : "<h1>None</h1><p>Nothing has been selected</p>"
        });

});

myApp.controller("CRUDController1", function ($scope ,$http,$filter ){

    $scope.kinship = []; $scope.relative = [];
    $scope.id=0;
    $scope.loadkinship = function () {

        $http.get('http://localhost/employee_managment/public/employee')

            .then(function success(e) {
                console.log(e);
                $scope.kinship = e.data.kinship;
                $scope.relative = e.data.relative;

            });
    };
    $scope.loadkinship();



    //******************// Add new kinship
    $scope.addkinship = function () {
        var payload = new FormData();
        var files = document.getElementById('image').files[0];
        payload.append('image',files);
        // var f = document.getElementById('image').files[0];

        // var payload = new FormData();

        payload.append('employee_id', $scope.id);
        payload.append('FirstName', $scope.kinship.FirstName);
        payload.append('SecondName', $scope.kinship.SecondName);
        payload.append('ThirdName', $scope.kinship.ThirdName);
        payload.append('FourthName', $scope.kinship.FourthName);
        payload.append('relative_relation', $scope.kinship.relative_relation);
        payload.append('Date_of_Birth',$filter('date')(new Date($scope.kinship.Date_of_Birth), 'yyyy-MM-dd'));
        payload.append('Social_status', $scope.kinship.Social_status);
        payload.append('Study', $scope.kinship.Study);
        payload.append('work', $scope.kinship.work);


        // payload.append('image',$scope.info.image);

                $http({
            method: 'POST',
            url: 'http://localhost/employee_managment/public/employee',

        data:
            payload

                ,

                transformRequest: angular.identity,
            headers: {'Content-Type': undefined},

        dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit Success');
            $scope.loadkinship();
        }, function errorCallback(response) {
            console.log(response);
            $scope.recordErrorsKinship(response);


            // alert('Submit Error');
            $scope.loadkinship();

        });
    }


//  /***************** delete
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            var url='http://localhost/employee_managment/public/employee/' + id;
            $http.delete(url).then(function (data) {

                console.log(data);
                $scope.loadkinship();

            }, function (response) {
                console.log(data);
                alert('can’t delete this record');

            });
        } else {
            return false;
        }
    }


    //********************************************************


    $scope.info = []; $scope.specialization=[];
    $scope.loadinfo = function () {
        $http.get('http://localhost/employee_managment/public/employee_info')
            .then(function success(e) {
                $scope.info = e.data.info;
                $scope.specialization = e.data.specialization;

            });
    };
    $scope.loadinfo();

    $scope.confirmDelete_info = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            var url='http://localhost/employee_managment/public/employee_info/' + id;
            $http.delete(url).then(function (data) {

                console.log(data);
                $scope.loadinfo();

            }, function (response) {
                console.log(data);
                alert('can’t delete this record');
                $scope.loadinfo();


            });
        } else {
            return false;
        }
    };

    /////////////////
    //2. show the create form
    // $scope.errors = [];


    // Add new User
    $scope.addinfo = function () {
        var payload = new FormData();
        var files = document.getElementById('image').files[0];
        payload.append('image',files);
        // var f = document.getElementById('image').files[0];

        // var payload = new FormData();
        payload.append('firstName', $scope.info.firstName);
        payload.append('secondName', $scope.info.secondName);
        payload.append('thirdName', $scope.info.thirdName);
        payload.append('fourthName', $scope.info.fourthName);
        payload.append('email', $scope.info.email);
        payload.append('idNum', $scope.info.idNum);
        payload.append('functionalNum', $scope.info.functionalNum);
        payload.append('specialization', $scope.info.specialization);
        payload.append('socialStatus', $scope.info.socialStatus);
        payload.append('gender', $scope.info.gender);
        payload.append('mobile', $scope.info.mobile);
        payload.append('dateOfHiring', $filter('date')(new Date($scope.info.dateOfHiring), 'yyyy-MM-dd'));
        payload.append('dateBirth', $filter('date')(new Date($scope.info.dateBirth), 'yyyy-MM-dd'));
        payload.append('phone', $scope.info.phone);
        payload.append('address', $scope.info.address);

        // payload.append('image',$scope.info.image);
// console.log(payload.values());
        $http({
            method: 'POST',
            url: 'http://localhost/employee_managment/public/employee_info',
            data:
       payload

            ,

            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
            dataType: 'json'

        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit success');

            // alert('Submit Success');
            // alert(response.data.id);
            $scope.id = response.data.id;
        }, function error(error) {
            // console.log(response);
            $scope.recordErrors(error);


            // $scope.loadinfo();

        });
        }
    //    **************************************************
        $scope.degree=[];
$scope.qualification = [];
    $scope.specialization = [];$scope.university = [];
    $scope.loaddegree = function () {

        $http.get('http://localhost/employee_managment/public/employee_degree')

            .then(function success(e) {
                console.log(e);
                $scope.qualification = e.data.qualification;
                $scope.specialization = e.data.specialization;
                $scope.university = e.data.university;
                $scope.degree = e.data.degree;


            });
    };
    $scope.loaddegree();



//  /***************** delete degree
    $scope.confirmDelete_degree = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            var url = 'http://localhost/employee_managment/public/employee_degree/' + id;
            $http.delete(url).then(function (data) {

                console.log(data);
                $scope.loaddegree();

            }, function (response) {
                console.log(data);
                alert('can’t delete this record');

            });
        } else {
            return false;
        }
    }
    //******************// Add new degree
    $scope.adddegree = function () {
        $http({
            method: 'POST',
            url: 'http://localhost/employee_managment/public/employee_degree',
            data: {
                employee_id :$scope.id,

                qualification: $scope.degree.qualification,
                date_of_specialization: $filter('date')(new Date($scope.degree.date_of_specialization), 'yyyy-MM-dd'),
                specialization: $scope.degree.specialization,
                university: $scope.degree.university,
                details: $scope.degree.details,
            },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit Success');
            $scope.loaddegree();
        }, function errorCallback(response) {
            console.log(response);
            $scope.recordErrorsDegree(response);

            // alert('Submit Error');
            $scope.loaddegree();

        });
    }
//************************************************************************
    $scope.course=[];

    $scope.loadcourse = function () {

        $http.get('http://localhost/employee_managment/public/employee_course')

            .then(function success(e) {

                console.log(e);
                $scope.course = e.data.course;



            });
    };
    $scope.loadcourse();

//  /***************** delete degree
    $scope.confirmDelete_course = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            var url = 'http://localhost/employee_managment/public/employee_course/' + id;
            $http.delete(url).then(function (data) {

                console.log(data);
                $scope.loadcourse();

            }, function (response) {
                console.log(data);
                alert('can’t delete this record');

            });
        } else {
            return false;
        }
    }


    //******************// Add new degree
    $scope.addcourse = function () {
        $http({
            method: 'POST',
            url: 'http://localhost/employee_managment/public/employee_course',
            data: {
                employee_id :$scope.id,

                Course_Name: $scope.course.Course_Name,
                Start_Date: $filter('date')(new Date($scope.course.Start_Date), 'yyyy-MM-dd'),
                Expiry_date: $filter('date')(new Date($scope.course.Expiry_date), 'yyyy-MM-dd'),
                place: $scope.course.place,
                details: $scope.course.details,
            },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit Success');
            $scope.loadcourse();

        }, function errorCallback(response) {
            console.log(response);
            $scope.recordErrorsCourse(response);

            // alert('Submit Error');
            $scope.loadcourse();

        });
    }
//*********************************************************************88
    $scope.experience = []; $scope.coin = [];
    $scope.loadexperience = function () {

        $http.get('http://localhost/employee_managment/public/employee_experience')

            .then(function success(e) {
                console.log(e);
                $scope.coin = e.data.coin;
                $scope.experience = e.data.experience;

            });
    };
    $scope.loadexperience();



//  /***************** delete experience
    $scope.confirmDelete_experience = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            var url = 'http://localhost/employee_managment/public/employee_experience/' + id;
            $http.delete(url).then(function (data) {

                console.log(data);
                $scope.loadexperience();

            }, function (response) {
                console.log(data);
                alert('can’t delete this record');

            });
        } else {
            return false;
        }
    }
    //******************// Add new experience
    $scope.addexperience = function () {
        $http({
            method: 'POST',
            url: 'http://localhost/employee_managment/public/employee_experience',
            data: {
                employee_id :$scope.id,

                Workplace: $scope.experience.Workplace,
                Job_title: $scope.experience.Job_title,
                Salary: $scope.experience.Salary,
                coin: $scope.experience.coin,
                details: $scope.experience.details,
                Start_Date: $filter('date')(new Date($scope.experience.Start_Date), 'yyyy-MM-dd'),
                Expiry_date: $filter('date')(new Date($scope.experience.Expiry_date), 'yyyy-MM-dd'),

            },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit Success');
            $scope.loadexperience();
        }, function errorCallback(response) {
            console.log(response);
            $scope.recordErrorsExperience(response);


            // alert('Submit Error');
            $scope.loadexperience();

        });
    }

    $scope.recordErrors = function (error) {
        $scope.errors = [];
        if (error.data.errors.firstName) {
            $scope.errors.push(error.data.errors.firstName[0]);
        } else if (error.data.errors.secondName) {
            $scope.errors.push(error.data.errors.secondName[0]);
        } else if (error.data.errors.thirdName) {
            $scope.errors.push(error.data.errors.thirdName[0]);
        } else if (error.data.errors.fourthName) {
            $scope.errors.push(error.data.errors.fourthName[0]);
        } else if (error.data.errors.email) {
            $scope.errors.push(error.data.errors.email[0]);
        } else if (error.data.errors.idNum) {
            $scope.errors.push(error.data.errors.idNum[0]);
        } else if (error.data.errors.functionalNum) {
            $scope.errors.push(error.data.errors.functionalNum[0]);
        } else if (error.data.errors.specialization) {
            $scope.errors.push(error.data.errors.specialization[0]);
        } else if (error.data.errors.mobile) {
            $scope.errors.push(error.data.errors.mobile[0]);
        } else if (error.data.errors.phone) {
            $scope.errors.push(error.data.errors.phone[0]);
        } else if (error.data.errors.dateOfHiring) {
            $scope.errors.push(error.data.errors.dateOfHiring[0]);
        } else if (error.data.errors.dateBirth) {
            $scope.errors.push(error.data.errors.dateBirth[0]);
        }else if (error.data.errors.address) {
            $scope.errors.push(error.data.errors.address[0]);
        }else if (error.data.errors.socialStatus) {
            $scope.errors.push(error.data.errors.socialStatus[0]);
        }else if (error.data.errors.gender) {
            $scope.errors.push(error.data.errors.gender[0]);
        }else if (error.data.errors.image) {
            $scope.errors.push(error.data.errors.image[0]);
        }
    }


    $scope.recordErrorsKinship = function (error) {
        $scope.errors = [];
        if (error.data.errors.FirstName) {
            $scope.errors.push(error.data.errors.FirstName[0]);
        } else if (error.data.errors.SecondName) {
            $scope.errors.push(error.data.errors.SecondName[0]);
        }else if (error.data.errors.ThirdName) {
            $scope.errors.push(error.data.errors.ThirdName[0]);
        }else if (error.data.errors.FourthName) {
            $scope.errors.push(error.data.errors.FourthName[0]);
        }else if (error.data.errors.relative_relation) {
            $scope.errors.push(error.data.errors.relative_relation[0]);
        }else if (error.data.errors.Date_of_Birth) {
            $scope.errors.push(error.data.errors.Date_of_Birth[0]);
        }else if (error.data.errors.Social_status) {
            $scope.errors.push(error.data.errors.Social_status[0]);
        }else if (error.data.errors.Study) {
            $scope.errors.push(error.data.errors.Study[0]);
        }else if (error.data.errors.work) {
            $scope.errors.push(error.data.errors.work[0]);
        }else if (error.data.errors.image) {
            $scope.errors.push(error.data.errors.image[0]);
        }
    }


    $scope.recordErrorsDegree = function (error) {
        $scope.errors = [];
        if (error.data.errors.qualification) {
            $scope.errors.push(error.data.errors.qualification[0]);
        } else if (error.data.errors.specialization) {
            $scope.errors.push(error.data.errors.specialization[0]);
        } else if (error.data.errors.university) {
            $scope.errors.push(error.data.errors.university[0]);
        } else if (error.data.errors.date_of_specialization) {
            $scope.errors.push(error.data.errors.date_of_specialization[0]);
        } else if (error.data.errors.details) {
            $scope.errors.push(error.data.errors.details[0]);
        }
    }
    $scope.recordErrorsCourse= function (error) {
        $scope.errors = [];
        if (error.data.errors.Course_Name) {
            $scope.errors.push(error.data.errors.Course_Name[0]);
        } else if (error.data.errors.place) {
            $scope.errors.push(error.data.errors.place[0]);
        } else if (error.data.errors.Start_Date) {
            $scope.errors.push(error.data.errors.Start_Date[0]);
        } else if (error.data.errors.Expiry_date) {
            $scope.errors.push(error.data.errors.Expiry_date[0]);
        } else if (error.data.errors.details) {
            $scope.errors.push(error.data.errors.details[0]);
        }
    }
    $scope.recordErrorsExperience= function (error) {
        $scope.errors = [];
        if (error.data.errors.Workplace) {
            $scope.errors.push(error.data.errors.Workplace[0]);
        } else if (error.data.errors.Job_title) {
            $scope.errors.push(error.data.errors.Job_title[0]);
        } else if (error.data.errors.Start_Date) {
            $scope.errors.push(error.data.errors.Start_Date[0]);
        } else if (error.data.errors.Expiry_date) {
            $scope.errors.push(error.data.errors.Expiry_date[0]);
        } else if (error.data.errors.Salary) {
        $scope.errors.push(error.data.errors.Salary[0]);
    } else if (error.data.errors.coin) {
        $scope.errors.push(error.data.errors.coin[0]);
    } else if (error.data.errors.details) {
            $scope.errors.push(error.data.errors.details[0]);
        }
    }
});


myApp.controller("CRUDController2", function ($scope ,$http,$filter ,$routeParams) {
    $scope.kinship = [];
    $scope.relative = [];
    $scope.Date_of_Birth=new Date();

//  /***************** edit

    $scope.editkinship = function () {

        $http({
            method: 'get',
            url: 'http://localhost/employee_managment/public/employee/' + $routeParams.id + '/edit'
        })
            .then(function success(e) {
                console.log(e);

                $scope.kinship = e.data.kinship;
                $scope.relative = e.data.relative;
                $scope.Date_of_Birth=new Date(e.data.kinship.Date_of_Birth);


            });
    };
    $scope.editkinship();
//  /***************** update
    $scope.updatekinship = function () {

        var payload = new FormData();
        var files = document.getElementById('image3').files[0];
        payload.append('image',files);
        // var f = document.getElementById('image').files[0];

        // var payload = new FormData();
        payload.append('id', $routeParams.id);
        payload.append('employee_id', $routeParams.employee_id);
        payload.append('FirstName', $scope.kinship.FirstName);
        payload.append('SecondName', $scope.kinship.SecondName);
        payload.append('ThirdName', $scope.kinship.ThirdName);
        payload.append('FourthName', $scope.kinship.FourthName);
        payload.append('relative_relation', $scope.kinship.relative_relation);
        payload.append('Date_of_Birth',$filter('date')(new Date($scope.kinship.Date_of_Birth), 'yyyy-MM-dd'));
        payload.append('Social_status', $scope.kinship.Social_status);
        payload.append('Study', $scope.kinship.Study);
        payload.append('work', $scope.kinship.work);
        $http({
            method: 'POST',
            url: 'http://localhost/employee_managment/public/employee/' + $routeParams.id,
            data:payload ,
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
            //     {
            //     id: $routeParams.id,
            //     employee_id :$routeParams.employee_id,
            //     FirstName: $scope.kinship.FirstName,
            //     SecondName: $scope.kinship.SecondName,
            //     ThirdName: $scope.kinship.ThirdName,
            //     FourthName: $scope.kinship.FourthName,
            //     relative_relation: $scope.kinship.relative_relation,
            //     Date_of_Birth: $filter('date')(new Date($scope.kinship.Date_of_Birth), 'yyyy-MM-dd'),
            //     Social_status: $scope.kinship.Social_status,
            //     Study: $scope.kinship.Study,
            //     work: $scope.kinship.work,
            //     image: $scope.kinship.image
            //
            // },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert(' edit successfully');

            // $scope.displayData();
            // $scope.loadkinship();


        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
        });
    }
});
myApp.controller("CRUDController3", function ($scope ,$http,$filter ,$routeParams, $window) {

//  /***************** edit
    $scope.info = [];
    $scope.specialization = [];
    $scope.dateOfHiring=new Date();
    $scope.dateBirth=new Date();
    $scope.editInfo = function () {

        $http({
            method: 'get',
            url: 'http://localhost/employee_managment/public/employee_info/' + $routeParams.id + '/edit'
        })
            .then(function success(e) {
                console.log(e);
                $scope.info = e.data.info;
                $scope.specialization = e.data.specialization;
                $scope.dateOfHiring=new Date(e.data.info.dateOfHiring);
                $scope.dateBirth=new Date(e.data.info.dateBirth);

            });
    };
    $scope.editInfo();
//  /***************** update
    $scope.updateInfo = function () {

        var payload = new FormData();
        var files = document.getElementById('image2').files[0];
        payload.append('image',files);
        // var f = document.getElementById('image').files[0];

        payload.append('id', $routeParams.id);
        payload.append('firstName', $scope.info.firstName);
        payload.append('secondName', $scope.info.secondName);
        payload.append('thirdName', $scope.info.thirdName);
        payload.append('fourthName', $scope.info.fourthName);
        payload.append('email', $scope.info.email);
        payload.append('idNum', $scope.info.idNum);
        payload.append('functionalNum', $scope.info.functionalNum);
        payload.append('specialization', $scope.info.specialization);
        payload.append('socialStatus', $scope.info.socialStatus);
        payload.append('gender', $scope.info.gender);
        payload.append('mobile', $scope.info.mobile);
        payload.append('dateOfHiring', $filter('date')(new Date($scope.info.dateOfHiring), 'yyyy-MM-dd'));
        payload.append('dateBirth', $filter('date')(new Date($scope.info.dateBirth), 'yyyy-MM-dd'));
        payload.append('phone', $scope.info.phone);
        payload.append('address', $scope.info.address);
        $http({
            method: 'POST',
            url: 'http://localhost/employee_managment/public/employee_info/' + $routeParams.id,
            data: payload ,
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
            //     {
            //     id: $routeParams.id,
            //     firstName: $scope.info.firstName,
            //     secondName: $scope.info.secondName,
            //     thirdName: $scope.info.thirdName,
            //     fourthName: $scope.info.fourthName,
            //     email: $scope.info.email,
            //     idNum: $scope.info.idNum,
            //     functionalNum: $scope.info.functionalNum,
            //     specialization: $scope.info.specialization,
            //     socialStatus: $scope.info.socialStatus,
            //     gender: $scope.info.gender,
            //     mobile: $scope.info.mobile,
            //     dateOfHiring: $filter('date')(new Date($scope.info.dateOfHiring), 'yyyy-MM-dd'),
            //     dateBirth: $filter('date')(new Date($scope.info.dateBirth), 'yyyy-MM-dd'),
            //     phone: $scope.info.phone,
            //     address: $scope.info.address,
            //     image: $scope.info.image,
            //
            // },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert(' edit successfully');
            // $scope.displayData();
            // $scope.loadkinship();


        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
        });
    }
});
myApp.controller("CRUDController4", function ($scope ,$http,$filter ,$routeParams) {

//  /***************** edit
    $scope.qualification = [];
    $scope.specialization = [];
    $scope.university = [];
    $scope.degree = [];
    $scope.date_of_specialization=new Date();
    $scope.editDegrres = function () {

        $http({
            method: 'get',
            url: 'http://localhost/employee_managment/public/employee_degree/' + $routeParams.id + '/edit'
        })
            .then(function success(e) {
                console.log(e);
                $scope.qualification = e.data.qualification;
                $scope.specialization = e.data.specialization;
                $scope.university = e.data.university;
                $scope.degree = e.data.degree;
                $scope.date_of_specialization=new Date(e.data.degree.date_of_specialization);


            });
    };
    $scope.editDegrres();
//  /***************** update
    $scope.updateDegrees = function () {

        // alert('sdvfedrh');

        $http({
            method: 'PUT',
            url: 'http://localhost/employee_managment/public/employee_degree/' + $routeParams.id ,
            data: {
                employee_id :$routeParams.employee_id,
                qualification: $scope.degree.qualification,
                date_of_specialization: $filter('date')(new Date($scope.degree.date_of_specialization), 'yyyy-MM-dd'),
                specialization: $scope.degree.specialization,
                university: $scope.degree.university,
                details: $scope.degree.details,
            },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert(' edit successfully');

            // $scope.displayData();
            // $scope.loadkinship();


        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
        });
    }
});
myApp.controller("CRUDController5", function ($scope ,$http,$filter ,$routeParams) {

//  /***************** edit
    $scope.course=[];
    $scope.Start_Date=new Date();
    $scope.Expiry_date=new Date();
    $scope.editCourse = function () {

        $http({
            method: 'get',
            url: 'http://localhost/employee_managment/public/employee_course/' + $routeParams.id+'/edit'
        })
            .then(function success(e) {
                console.log(e);
                $scope.course = e.data.course;
                $scope.Start_Date= new Date(e.data.course.Start_Date);
                $scope.Expiry_date=new Date(e.data.course.Expiry_date);

            });
    };
    $scope.editCourse();
//  /***************** update
    $scope.updateCourse =function () {

        // alert('sdvfedrh');

        $http({
            method: 'PUT',
            url:'http://localhost/employee_managment/public/employee_course/'+$routeParams.id,
            data: {
                id: $routeParams.id,
                employee_id :$routeParams.employee_id,

                Course_Name: $scope.course.Course_Name,
                Start_Date: $filter('date')(new Date($scope.course.Start_Date), 'yyyy-MM-dd'),
                Expiry_date: $filter('date')(new Date($scope.course.Expiry_date), 'yyyy-MM-dd'),
                place: $scope.course.place,
                details: $scope.course.details,

            },
            dataType : 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert(' edit successfully');

            // $scope.displayData();
            // $scope.loadkinship();


        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
        });
    }
});
    myApp.controller("CRUDController6", function ($scope ,$http,$filter ,$routeParams) {


//  /***************** edit
    $scope.coin=[]; $scope.experience=[];
        $scope.Start_Date=new Date();
        $scope.Expiry_date=new Date();
    $scope.editExperience = function () {

        $http({
            method: 'get',
            url: 'http://localhost/employee_managment/public/employee_experience/' + $routeParams.id+'/edit'
        })
            .then(function success(e) {
                console.log(e);
                $scope.coin = e.data.coin;
                $scope.experience = e.data.experience;
                $scope.Start_Date=new Date(e.data.experience.Start_Date);
                $scope.Expiry_date=new Date(e.data.experience.Expiry_date);

            });
    };
    $scope.editExperience();
//  /***************** update
    $scope.updateExperience =function () {

        // alert('sdvfedrh');

        $http({
            method: 'PUT',
            url:'http://localhost/employee_managment/public/employee_experience/'+$routeParams.id,
            data: {
                id: $routeParams.id,

                employee_id :$routeParams.employee_id,

                Workplace: $scope.experience.Workplace,
                Job_title: $scope.experience.Job_title,
                Salary: $scope.experience.Salary,
                coin: $scope.experience.coin,
                details: $scope.experience.details,
                Start_Date: $filter('date')(new Date($scope.experience.Start_Date), 'yyyy-MM-dd'),
                Expiry_date: $filter('date')(new Date($scope.experience.Expiry_date), 'yyyy-MM-dd'),
            },
            dataType : 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert(' edit successfully');

            // $scope.displayData();
            // $scope.loadkinship();


        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
        });
    }
});
