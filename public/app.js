


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

        $http.get('http://localhost/employee/public/employee')

            .then(function success(e) {
                console.log(e);
                $scope.kinship = e.data.kinship;
                $scope.relative = e.data.relative;

            });
    };
    $scope.loadkinship();



    //******************// Add new kinship
    $scope.addkinship = function () {
        alert($scope.id);
        $http({
            method: 'POST',
            url: 'http://localhost/employee/public/employee',
            data: {
                employee_id :$scope.id,
                FirstName: $scope.kinship.FirstName,
                SecondName: $scope.kinship.SecondName,
                ThirdName: $scope.kinship.ThirdName,
                FourthName: $scope.kinship.FourthName,
                relative_relation: $scope.kinship.relative_relation,
                Date_of_Birth: $filter('date')(new Date($scope.kinship.Date_of_Birth), 'yyyy-MM-dd'),
                Social_status: $scope.kinship.Social_status,
                Study: $scope.kinship.Study,
                work: $scope.kinship.work,
                image: $scope.kinship.image
            },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit Success');
            $scope.loadkinship();
        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
            $scope.loadkinship();

        });
    }


//  /***************** delete
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            var url='http://localhost/employee/public/employee/' + id;
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
        $http.get('http://localhost/employee/public/employee_info')
            .then(function success(e) {
                $scope.info = e.data.info;
                $scope.specialization = e.data.specialization;

            });
    };
    $scope.loadinfo();

    $scope.confirmDelete_info = function(id) {
        var isConfirmDelete = confirm('Are you sure you want to delete this record?');
        if (isConfirmDelete) {
            var url='http://localhost/employee/public/employee_info/' + id;
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
        $http({
            method: 'POST',
            url: 'http://localhost/employee/public/employee_info',
            data: {
                firstName: $scope.info.firstName,
                secondName: $scope.info.secondName,
                thirdName: $scope.info.thirdName,
                fourthName: $scope.info.fourthName,
                email: $scope.info.email,
                idNum: $scope.info.idNum,
                functionalNum: $scope.info.functionalNum,
                specialization: $scope.info.specialization,
                socialStatus: $scope.info.socialStatus,
                gender: $scope.info.gender,
                mobile: $scope.info.mobile,
                dateOfHiring: $filter('date')(new Date($scope.info.dateOfHiring), 'yyyy-MM-dd'),
                dateBirth: $filter('date')(new Date($scope.info.dateBirth), 'yyyy-MM-dd'),
                phone: $scope.info.phone,
                address: $scope.info.address,
                image: $scope.info.image,
            },
            dataType: 'json',
        }).then(function successCallback(response) {
            console.log(response);
            alert('Submit success');

            // alert('Submit Success');
            // alert(response.data.id);
            $scope.id = response.data.id;
            $scope.loadinfo();
        }, function errorCallback(response) {
            console.log(response);
            alert('Submit Error');
            $scope.loadinfo();

        });
        }
    //    **************************************************
        $scope.degree=[];
$scope.qualification = [];
    $scope.specialization = [];$scope.university = [];
    $scope.loaddegree = function () {

        $http.get('http://localhost/employee/public/employee_degree')

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
            var url = 'http://localhost/employee/public/employee_degree/' + id;
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
            url: 'http://localhost/employee/public/employee_degree',
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
            alert('Submit Error');
            $scope.loaddegree();

        });
    }
//************************************************************************
    $scope.course=[];

    $scope.loadcourse = function () {

        $http.get('http://localhost/employee/public/employee_course')

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
            var url = 'http://localhost/employee/public/employee_course/' + id;
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
            url: 'http://localhost/employee/public/employee_course',
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
            alert('Submit Error');
            $scope.loadcourse();

        });
    }
//*********************************************************************88
    $scope.experience = []; $scope.coin = [];
    $scope.loadexperience = function () {

        $http.get('http://localhost/employee/public/employee_experience')

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
            var url = 'http://localhost/employee/public/employee_experience/' + id;
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
            url: 'http://localhost/employee/public/employee_experience',
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
            alert('Submit Error');
            $scope.loadexperience();

        });
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
            url: 'http://localhost/employee/public/employee/' + $routeParams.id + '/edit'
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

        // alert('sdvfedrh');

        $http({
            method: 'PUT',
            url: 'http://localhost/employee/public/employee/' + $routeParams.id,
            data: {
                id: $routeParams.id,
                employee_id :$routeParams.employee_id,
                FirstName: $scope.kinship.FirstName,
                SecondName: $scope.kinship.SecondName,
                ThirdName: $scope.kinship.ThirdName,
                FourthName: $scope.kinship.FourthName,
                relative_relation: $scope.kinship.relative_relation,
                Date_of_Birth: $filter('date')(new Date($scope.kinship.Date_of_Birth), 'yyyy-MM-dd'),
                Social_status: $scope.kinship.Social_status,
                Study: $scope.kinship.Study,
                work: $scope.kinship.work,
                image: $scope.kinship.image

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
myApp.controller("CRUDController3", function ($scope ,$http,$filter ,$routeParams, $window) {

//  /***************** edit
    $scope.info = [];
    $scope.specialization = [];
    $scope.dateOfHiring=new Date();
    $scope.dateBirth=new Date();
    $scope.editInfo = function () {

        $http({
            method: 'get',
            url: 'http://localhost/employee/public/employee_info/' + $routeParams.id + '/edit'
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

        // alert('sdvfedrh');

        $http({
            method: 'PUT',
            url: 'http://localhost/employee/public/employee_info/' + $routeParams.id,
            data: {
                id: $routeParams.id,
                firstName: $scope.info.firstName,
                secondName: $scope.info.secondName,
                thirdName: $scope.info.thirdName,
                fourthName: $scope.info.fourthName,
                email: $scope.info.email,
                idNum: $scope.info.idNum,
                functionalNum: $scope.info.functionalNum,
                specialization: $scope.info.specialization,
                socialStatus: $scope.info.socialStatus,
                gender: $scope.info.gender,
                mobile: $scope.info.mobile,
                dateOfHiring: $filter('date')(new Date($scope.info.dateOfHiring), 'yyyy-MM-dd'),
                dateBirth: $filter('date')(new Date($scope.info.dateBirth), 'yyyy-MM-dd'),
                phone: $scope.info.phone,
                address: $scope.info.address,
                image: $scope.info.image,

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
            url: 'http://localhost/employee/public/employee_degree/' + $routeParams.id + '/edit'
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
            url: 'http://localhost/employee/public/employee_degree/' + $routeParams.id ,
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
            url: 'http://localhost/employee/public/employee_course/' + $routeParams.id+'/edit'
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
            url:'http://localhost/employee/public/employee_course/'+$routeParams.id,
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
            url: 'http://localhost/employee/public/employee_experience/' + $routeParams.id+'/edit'
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
            url:'http://localhost/employee/public/employee_experience/'+$routeParams.id,
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
