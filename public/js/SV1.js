
/**index.html */

angular.module('myApp', ['ui.bootstrap']);
angular.module('myApp').controller('mainCtrl', ['$scope', '$modal', function ($scope, $modal) {
    $scope.open = function (size) {
        var modalInstance = $modal.open({
            controller: 'PopupCont',
            templateUrl: 'forgotpass.html',
            backdrop: "static",
            scope: $scope,
            size: size
        });
    }

}]);

angular.module('myApp').controller('PopupCont', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };
}]);


/**mainpage.html */

var app = angular.module('app', ['ui.bootstrap', '720kb.datepicker', 'checklist-model']);

app.controller('mainCtrl', function ($scope) {
    var category = "";
    var projectTitle = "";

    /**calling the project section */
    $scope.callProject = function () {
        $scope.showcomp = false;
        $scope.showcontact = false;
        $scope.showsalesperson = false;
        $scope.showdealtable = false;
        $scope.showleadtable = false;
        $scope.showlostcasetable = false;
        $scope.show = true;
        $scope.showprojecttable = true;
        $scope.projectTitle = "Project Table: All Categories";
    }
    /**calling the company section */
    $scope.callCompany = function () {
        $scope.show = false;
        $scope.showsalesperson = false;
        $scope.showcontact = false;
        $scope.showcomp = true;
        $scope.projectTitle = "Companies Table";
    }
    /**calling the contact section */
    $scope.callContact = function () {
        $scope.show = false;
        $scope.showsalesperson = false;
        $scope.showcomp = false;
        $scope.showcontact = true;
        $scope.projectTitle = "Contacts Table";
    }
    /**calling the salesperson section */
    $scope.callSalesperson = function () {
        $scope.show = false;
        $scope.showsalesperson = false;
        $scope.showcomp = false;
        $scope.showcontact = false;
        $scope.showsalesperson = true;
        $scope.projectTitle = "Sales Person Table";
    }


    $scope.setTabletoDefault = function () {
        $scope.defaulttable = {
            columns: [1]
        };
        if ((category != 'lead') && (category != 'deal')) {
            $scope.colContactPerson = true;
            $scope.colEmail = false;
            $scope.colPhone = false;
            $scope.colIndustry = true;
            $scope.colProduct = true;
            $scope.colValue = true;
            $scope.colType = true;
            $scope.colCategory = true;
            $scope.colStartdate = true;
            $scope.colClosingdate = true;
            $scope.colSalesstage = true;
            $scope.colLastupdate = true;
            $scope.colRemarks = true;
        }

        if (category == 'lead') {
            $scope.colContactPerson = true;
            $scope.colEmail = false;
            $scope.colPhone = false;
            $scope.colIndustry = true;
            $scope.colProduct = true;
            $scope.colValue = true;
            $scope.colType = true;
            $scope.colCategory = true;
            $scope.colStartdate = true;
            $scope.colClosingdate = true;
            $scope.colSalesstage = true;
            $scope.colLastupdate = true;
            $scope.colRemarks = true;
            $scope.colStatus = true;
            $scope.colPersonincharge = true;
            $scope.colTender = true;
        }


        if (category == 'deal') {
            $scope.colContactPerson = true;
            $scope.colEmail = false;
            $scope.colPhone = false;
            $scope.colIndustry = true;
            $scope.colProduct = true;
            $scope.colValue = true;
            $scope.colType = true;
            $scope.colCategory = true;
            $scope.colStartdate = true;
            $scope.colClosingdate = true;
            $scope.colSalesstage = true;
            $scope.colLastupdate = true;
            $scope.colRemarks = true;
            $scope.colPOdate = true;
            $scope.colPersonincharge = true;
            $scope.colPOnum = true;
        }

    };


    /**reseting forms */
    $scope.resetForm = function (id) {
        if (id == 'filterForm')
            $scope.filterForm = {};

        if (id == 'columnForm')
            $scope.defaulttable = {
                columns: [1]
            };


    }

    $scope.resetDate = function () {
        $scope.startdate = "";
        $scope.enddate = "";
    }


    /**Sort table */

    $scope.predicate = 'No';

    $scope.sort = function (predicate) {
        $scope.predicate = predicate;
    }

    $scope.isSorted = function (predicate) {
        return ($scope.predicate == predicate)
    }



    var projects = [{

        No: 5,
        companyName: 'f',
        contactPerson: 's',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        product: 'f',
        value: '1000',
        type: '1',
        category: 'Lead',
        startDate: '10/03/2017',
        closingDate: '02/8/2017',
        salesStage: '40%',
        lastUpdate: '22/11/2017',
        pincharge: 'Iulia',
        remarks: 'sdddd'
    }, {
        No: 2,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Deal',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },

    {
        No: 3,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 7,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 20,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 18,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 13,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 9,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 10,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 22,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 33,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },
    {
        No: 34,
        companyName: 'z',
        contactPerson: 'q',
        email: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'p',
        product: 'f',
        value: '300',
        type: 'new sale',
        category: 'Lost case',
        startDate: '10/03/2016',
        closingDate: '02/8/2020',
        salesStage: '40%',
        lastUpdate: '22/11/2018',
        remarks: 'sdddd'
    },


    ];

    $scope.searchData = '';
    $scope.rows = projects;
    $scope.filteredRows = projects;

    $scope.checkLength = function () {

        $scope.curPage = 0;

    };

    $scope.curPage = 0;
    $scope.pageSize = 11;
    $scope.numberOfPages = function () {
        return Math.ceil($scope.rows.length / $scope.pageSize);
    };


    $scope.companylist = [{

        No: 1,
        companyName: 'f',
        contactPerson: 's',
        website: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        address: 'sdfcdf'

    }, {
        No: 12,
        companyName: 'a',
        contactPerson: 's',
        website: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        address: 'sdfcdf'
    },

    {
        No: 5,
        companyName: 'y',
        contactPerson: 's',
        website: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        address: 'sdfcdf'
    },
    {
        No: 3,
        companyName: 'y',
        contactPerson: 's',
        website: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        address: 'sdfcdf'
    },
    {
        No: 9,
        companyName: 'y',
        contactPerson: 's',
        website: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        address: 'sdfcdf'
    },
    {
        No: 35,
        companyName: 'y',
        contactPerson: 's',
        website: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        address: 'sdfcdf'
    },
    {
        No: 19,
        companyName: 'y',
        contactPerson: 's',
        website: 'sfdsdfdsgf',
        phone: '2736495',
        industry: 'f',
        address: 'sdfcdf'
    }
    ];



    $scope.contacts = [{

        No: 1,
        companyName: 'y',
        name: 'v',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',

    }, {
        No: 12,
        companyName: 'a',
        name: 'r',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
    },

    {
        No: 10,
        companyName: 'z',
        name: 'f',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
    },
    {
        No: 3,
        companyName: 'p',
        name: 'q',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
    },
    {
        No: 5,
        companyName: 'c',
        name: 'o',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
    },
    {
        No: 7,
        companyName: 'f',
        name: 'i',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
    },
    {
        No: 2,
        companyName: 'n',
        name: 'x',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
    }
    ];


    $scope.spersonlist = [{

        No: 1,
        name: 'v',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
        total: 5

    }, {
        No: 12,
        name: 'r',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
        total: 3
    },

    {
        No: 10,
        name: 'f',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
        total: 2
    },
    {
        No: 3,
        name: 'q',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
        total: 4
    },
    {
        No: 5,
        name: 'o',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
        total: 7
    },
    {
        No: 7,
        name: 'i',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
        total: 5
    },
    {
        No: 70,
        name: 'x',
        phone: '2736495',
        email: 'sfdsdfdsgf',
        position: 'f',
        total: 0
    }
    ];


    /**checkboxrule */

    $scope.checkboxRule1 = function (checkbox) {
        if (checkbox == 'lead') {
            $scope.filterForm.deal = false;
            $scope.filterForm.lostCase = false;
            $scope.filterForm.date = false;
        }
        if (checkbox == 'deal') {
            $scope.filterForm.lead = false;
            $scope.filterForm.lostCase = false;
            $scope.filterForm.date = false;
        }
        if (checkbox == 'lostCase') {
            $scope.filterForm.deal = false;
            $scope.filterForm.lead = false;
            $scope.filterForm.date = false;
        }
        if (checkbox == 'date') {
            $scope.filterForm.deal = false;
            $scope.filterForm.lead = false;
            $scope.filterForm.lostCase = false;
        }
    };

    /**checkbox names */

    $scope.columns = [
        { id: 1, name: 'Company Name' },
        { id: 2, name: 'Contact Person' },
        { id: 3, name: 'Industry' },
        { id: 4, name: 'Product' },
        { id: 5, name: 'Type' },
        { id: 6, name: 'Value' },
        { id: 7, name: 'Category' },
        { id: 8, name: 'Sales Stage' },
        { id: 9, name: 'Last Update' },
        { id: 10, name: 'Person in Charge' },
        { id: 11, name: 'Start Date' },
        { id: 12, name: 'Closing Date' },
        { id: 13, name: 'Status' },
        { id: 14, name: 'Email' },
        { id: 15, name: 'Phone' },
        { id: 16, name: 'Tender' },
        { id: 17, name: 'Remarks' },
        { id: 18, name: 'PO-Date' },
        { id: 19, name: 'PO-Number' }

    ];


    $scope.columns[0].disabled = true;

    /**define whether the checkboxes should be disable depending on project category */

    $scope.checkCategory = function () {

        $scope.columns[12].disabled = true;
        $scope.columns[15].disabled = true;
        $scope.columns[17].disabled = true;
        $scope.columns[18].disabled = true;
        $scope.columns[9].disabled = true;

        if (category == 'lead') {
            $scope.columns[17].disabled = true;
            $scope.columns[18].disabled = true;
            $scope.columns[12].disabled = false;
            $scope.columns[15].disabled = false;
            $scope.columns[9].disabled = false;

        }
        if (category == 'deal') {

            $scope.columns[12].disabled = true;
            $scope.columns[15].disabled = true;
            $scope.columns[17].disabled = false;
            $scope.columns[18].disabled = false;
            $scope.columns[9].disabled = false;
        }

    };


    $scope.setDefault = function () {
        category = "";
        $scope.projectTitle = "Project Table: All Categories";
        $scope.showprojecttable = true;
        $scope.showdealtable = false;
        $scope.showleadtable = false;
        $scope.showlostcasetable = false;
        $scope.colContactPerson = true;
        $scope.colEmail = false;
        $scope.colPhone = false;
        $scope.colIndustry = true;
        $scope.colProduct = true;
        $scope.colValue = true;
        $scope.colType = true;
        $scope.colCategory = true;
        $scope.colStartdate = true;
        $scope.colClosingdate = true;
        $scope.colSalesstage = true;
        $scope.colLastupdate = true;
        $scope.colRemarks = true;

    };

    /**filter the table content */
    $scope.filterContent = function () {

        if ($scope.filterForm.lead) {
            category = "lead";
            $scope.projectTitle = "Project Table: Leads Category";
            $scope.showprojecttable = false;
            $scope.showdealtable = false;
            $scope.showlostcasetable = false;
            $scope.showleadtable = true;
            $scope.colPersonincharge = true;
            $scope.colStatus = true;
            $scope.colTender = true;
            $scope.colContactPerson = true;
            $scope.colEmail = false;
            $scope.colPhone = false;
            $scope.colIndustry = true;
            $scope.colProduct = true;
            $scope.colValue = true;
            $scope.colType = true;
            $scope.colCategory = true;
            $scope.colStartdate = true;
            $scope.colClosingdate = true;
            $scope.colSalesstage = true;
            $scope.colLastupdate = true;
            $scope.colRemarks = true;

        }

        if ($scope.filterForm.deal) {
            category = "deal";
            $scope.projectTitle = "Project Table: Deals Category";
            $scope.showdealtable = true;
            $scope.showlostcasetable = false;
            $scope.showprojecttable = false;
            $scope.showleadtable = false;
            $scope.colPersonincharge = true;
            $scope.colStatus = false;
            $scope.colTender = false;
            $scope.colContactPerson = true;
            $scope.colEmail = false;
            $scope.colPhone = false;
            $scope.colIndustry = true;
            $scope.colProduct = true;
            $scope.colValue = true;
            $scope.colType = true;
            $scope.colCategory = true;
            $scope.colStartdate = true;
            $scope.colClosingdate = true;
            $scope.colSalesstage = true;
            $scope.colLastupdate = true;
            $scope.colRemarks = true;
            $scope.colPOnum = true;
            $scope.colPOdate = true;

        }
        if ($scope.filterForm.lostCase) {
            category = "lostcase";
            $scope.projectTitle = "Project Table: Lost Cases Category";
            $scope.showdealtable = false;
            $scope.showprojecttable = false;
            $scope.showleadtable = false;
            $scope.showlostcasetable = true;
            $scope.colContactPerson = true;
            $scope.colEmail = false;
            $scope.colPhone = false;
            $scope.colIndustry = true;
            $scope.colProduct = true;
            $scope.colValue = true;
            $scope.colType = true;
            $scope.colCategory = true;
            $scope.colStartdate = true;
            $scope.colClosingdate = true;
            $scope.colSalesstage = true;
            $scope.colLastupdate = true;
            $scope.colRemarks = true;
        }
    };


    /**filtering table columns */
    var list = [];
    var list1 = [];
    var total = 0;
    var total1 = 0;

    $scope.filtertablecolumns = function (number, list) {

        $scope.list = list;
        total = number;

        $scope.colContactPerson = false;
        $scope.colEmail = false;
        $scope.colPhone = false;
        $scope.colIndustry = false;
        $scope.colProduct = false;
        $scope.colValue = false;
        $scope.colType = false;
        $scope.colCategory = false;
        $scope.colStartdate = false;
        $scope.colClosingdate = false;
        $scope.colSalesstage = false;
        $scope.colLastupdate = false;
        $scope.colRemarks = false;
        $scope.colStatus = false;
        $scope.colTender = false;
        $scope.colPOnum = false;
        $scope.colPOdate = false;

        for (var i = 0; i < total; i++) {

            if (list[i] == 2)
                $scope.colContactPerson = true;

            if (list[i] == 3)
                $scope.colIndustry = true;

            if (list[i] == 4)
                $scope.colProduct = true;

            if (list[i] == 5)
                $scope.colType = true;

            if (list[i] == 6)
                $scope.colValue = true;

            if (list[i] == 7)
                $scope.colCategory = true;

            if (list[i] == 8)
                $scope.colSalesstage = true;

            if (list[i] == 9)
                $scope.colLastupdate = true;


            if (list[i] == 11)
                $scope.colStartdate = true;

            if (list[i] == 12)
                $scope.colClosingdate = true;

            if (list[i] == 13) {
                if (category == 'lead')
                    $scope.colStatus = true;
            }

            if (list[i] == 14)
                $scope.colEmail = true;

            if (list[i] == 15)
                $scope.colPhone = true;

            if (list[i] == 16) {
                if (category == 'lead')
                    $scope.colTender = true;
            }

            if (list[i] == 17)
                $scope.colRemarks = true;

            if (list[i] == 18) {
                if (category == 'deal')
                    $scope.colPOnum = true;
            }

            if (list[i] == 19) {
                if (category == 'deal')
                    $scope.colPOdate = true;
            }

        }


        /** Lead table */
        /** Deal table */
        /** lost cases table */

    };
    $scope.projecttable = {
        projects: []
    };
    $scope.companytable = {
        companylist: []
    };
    $scope.contacttable = {
        contacts: []
    };

    $scope.spersontable = {
        spersonlist: []
    };

}).filter('pagination', function () {
    return function (input, start) {
        start = +start;
        return input.slice(start);
    };
}
    );





/**modals */


app.controller('MyControllerModal', ['$scope', '$modal', function ($scope, $modal) {

    /** nav bar modals */
    $scope.openL = function (size) {
        var modalInstance = $modal.open({
            controller: 'forCloseLead',
            templateUrl: 'leadproject.html',
            backdrop: "static",
            scope: $scope,
            size: size

        });

    }

    $scope.openD = function (size) {
        var modalInstance = $modal.open({
            controller: 'forCloseDeal',
            templateUrl: 'dealproject.html',
            backdrop: "static",
            scope: $scope,
            size: size

        });

    }

    $scope.openchangepassword = function (size) {
        var modalInstance = $modal.open({
            controller: 'forClosePassword',
            templateUrl: 'changepasswordmodal.html',
            backdrop: "static",
            scope: $scope,
            size: size

        });

    }

    $scope.openindustry = function (size) {
        var modalInstance = $modal.open({
            controller: 'forCloseIndustry',
            templateUrl: 'editindustry.html',
            backdrop: "static",
            scope: $scope,
            size: size

        });

    }

    $scope.openproduct = function (size) {
        var modalInstance = $modal.open({
            controller: 'forCloseProduct',
            templateUrl: 'editproduct.html',
            backdrop: "static",
            scope: $scope,
            size: size

        });

    }
/**not required for now 
    $scope.opencontact = function (size) {
        var modalInstance = $modal.open({
            controller: 'forCloseContact',
            templateUrl: 'addcontact.html',
            backdrop: "static",
            scope: $scope,
            size: size

        });


    }*/

    $scope.opensalesperson = function (size) {
        var modalInstance = $modal.open({
            controller: 'forCloseSalesperson',
            templateUrl: 'addsalesperson.html',
            backdrop: "static",
            scope: $scope,
            size: size

        });



    };

    /** project modals */
    $scope.openDelete = function (size, proj) {
        var modalInstance = $modal.open({
            controller: 'forCloseDelete',
            templateUrl: 'delete.html',
            backdrop: "static",
            scope: $scope,
            size: size,

        });
        modalInstance.id = proj;
    };


    $scope.openmultipledelete = function (list) {
        if ($scope.projecttable.projects == 0) {
            var modalInstance = $modal.open({
                controller: 'forCloseMultipledeleteErrormessage',
                templateUrl: 'multipledelete2.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
        }
        else {
            var modalInstance = $modal.open({
                controller: 'forCloseMultipledelete',
                templateUrl: 'multipledelete.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
            modalInstance.list = list;
        }
    };

    $scope.openEdit = function (size, proj) {
        if (proj.category == 'Lead') {
            var modalInstance = $modal.open({
                controller: 'forCloseEditlead',
                templateUrl: 'editlead.html',
                backdrop: "static",
                scope: $scope,
                size: size,

            });
            modalInstance.leadproject = proj;
        }
        if (proj.category == 'Deal') {
            var modalInstance = $modal.open({
                controller: 'forCloseEditdeal',
                templateUrl: 'editdeal.html',
                backdrop: "static",
                scope: $scope,
                size: size,

            });
            modalInstance.dealproject = proj;
        }
        if (proj.category == 'Lost case') {
            var modalInstance = $modal.open({
                controller: 'forCloseEditlostcase',
                templateUrl: 'editlostcase.html',
                backdrop: "static",
                scope: $scope,
                size: size,

            });
            modalInstance.lostcaseproject = proj;
        }


    };
    /**Company modals */
    $scope.openEditcomp = function (size, company) {
        var modalInstance = $modal.open({
            controller: 'forCloseEditcomp',
            templateUrl: 'editcompany.html',
            backdrop: "static",
            scope: $scope,
            size: size,

        });
        modalInstance.comlist = company;
    };

    $scope.openDeletecomp = function (size, company) {
        var modalInstance = $modal.open({
            controller: 'forCloseDeletecomp',
            templateUrl: 'delete.html',
            backdrop: "static",
            scope: $scope,
            size: size,

        });
        modalInstance.comlist = company;
    };

    $scope.openmultiplecompanydelete = function (comlist) {
        if ($scope.companytable.companylist == 0) {
            var modalInstance = $modal.open({
                controller: 'forCloseMultipledeletecompErrormessage',
                templateUrl: 'multipledelete2.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
        }
        else {
            var modalInstance = $modal.open({
                controller: 'forCloseMultiplecompdelete',
                templateUrl: 'multipledelete.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
        }
        modalInstance.list = comlist;


    };

    /**contact modals */
    $scope.openEditcont = function (size, contact) {
        var modalInstance = $modal.open({
            controller: 'forCloseEditcont',
            templateUrl: 'editcontact.html',
            backdrop: "static",
            scope: $scope,
            size: size,

        });
        modalInstance.contlist = contact;
    };

    $scope.openDeletecont = function (size, contact) {
        var modalInstance = $modal.open({
            controller: 'forCloseDeletecont',
            templateUrl: 'delete.html',
            backdrop: "static",
            scope: $scope,
            size: size,

        });
        modalInstance.contlist = contact;
    };

    $scope.openmultiplecontactdelete = function (contlist) {
        if ($scope.contacttable.contacts == 0) {
            var modalInstance = $modal.open({
                controller: 'forCloseMultipledeletecontErrormessage',
                templateUrl: 'multipledelete2.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
        }
        else {
            var modalInstance = $modal.open({
                controller: 'forCloseMultiplecontdelete',
                templateUrl: 'multipledelete.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
        }
        modalInstance.list = contlist;
    };

    /**salesperson modals */
    $scope.openEditsperson = function (size, sperson) {
        var modalInstance = $modal.open({
            controller: 'forCloseEditcont',
            templateUrl: 'editsalesperson.html',
            backdrop: "static",
            scope: $scope,
            size: size,

        });
        modalInstance.list = sperson;
    };

    $scope.openDeletesperson = function (size, sperson) {
        var modalInstance = $modal.open({
            controller: 'forCloseDeletepers',
            templateUrl: 'delete.html',
            backdrop: "static",
            scope: $scope,
            size: size,

        });
        modalInstance.list = sperson;
    };

    $scope.openmultiplespersondelete = function (perslist) {
        if ($scope.spersontable.spersonlist == 0) {
            var modalInstance = $modal.open({
                controller: 'forCloseMultipledeletepersErrormessage',
                templateUrl: 'multipledelete2.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
        }
        else {
            var modalInstance = $modal.open({
                controller: 'forCloseMultiplepersdelete',
                templateUrl: 'multipledelete.html',
                backdrop: "static",
                scope: $scope,
                size: 'sm',

            });
        }
        modalInstance.list = perslist;
    };



}]);




/** modal controllers */


/** project modal controllers */
app.controller('forCloseLead', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
  
    $scope.companies = [
    {
        "id": "114",

        "name": "Company 1"
    },
    {
        "id": "126",

        "name": "Company 2"
    },
    {
        "id": "149",
        "name": "Company 3"
    }];

 
    $scope.project = {
        "typeID": "0",

    }
    $scope.types = [
    {
        "id": "1",
        "name": "New Sale"
    },
    {
        "id": "2",
        "name": "Renewal"
    }

    ];

 
    $scope.statuses = [
    {
        "id": "1",
        "name": "In progress"
    },
    {
        "id": "2",
        "name": "Successful"
    },
    {
        "id": "3",
        "name": "Terminated"
    }


    ];

    $scope.checkboxRule = function (checkbox) {
        if (checkbox == 'tenderYes') {
            $scope.tenderNo = false;
            $scope.tenderPossibly = false;
        }
        if (checkbox == 'tenderNo') {
            $scope.tenderYes = false;
            $scope.tenderPossibly = false;
        }
        if (checkbox == 'tenderPossibly') {
            $scope.tenderYes = false;
            $scope.tenderNo = false;
        }
    };
    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };

}]);

app.controller('forCloseDeal', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
  
    $scope.companies = [
    {
        "id": "114",

        "name": "Company 1"
    },
    {
        "id": "126",

        "name": "Company 2"
    },
    {
        "id": "149",
        "name": "Company 3"
    }];


    $scope.types = [
    {
        "id": "1",
        "name": "New Sale"
    },
    {
        "id": "2",
        "name": "Renewal"
    }

    ];

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };

}]);

app.controller('forCloseDelete', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeader = "Delete a Project";
    $scope.deleteTitle = "Are you sure to delete this project?";
    $scope.removeRow = function () {
        var currentid = $modalInstance.id;
        var index = $scope.rows.indexOf(currentid);
        $scope.rows.splice(index, 1);
    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);



app.controller('forClosePassword', ['$scope', '$modalInstance', function ($scope, $modalInstance) {



    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);


app.controller('forCloseIndustry', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.industryList = [{
        name: 'Healthcare'
    },
    {
        name: 'Retail'
    },
    {
        name: 'Education'
    },
    {
        name: 'Reseller'
    },
    {
        name: 'Automotive'
    },
    {
        name: 'Financial'
    },
    {
        name: 'Industrial'
    },
    {
        name: 'Telecommunication'
    }
    ];

    $scope.deleteSelected = function (index) {
        $scope.industryList.splice(index, 1);
    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);


app.controller('forCloseProduct', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.productList = [{
        name: 'Healthcare'
    },
    {
        name: 'Retail'
    },
    {
        name: 'Education'
    },
    {
        name: 'Reseller'
    },
    {
        name: 'Automotive'
    },
    {
        name: 'Financial'
    },
    {
        name: 'Industrial'
    },
    {
        name: 'Telecommunication'
    }
    ];

    $scope.deleteSelected = function (index) {
        $scope.productList.splice(index, 1);
    };
    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

app.controller('forCloseEditlead', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.leadproject = {
        "typeID": "",

    };
    $scope.statuses = [
        {
            "id": "1",
            "name": "In progress"
        },
        {
            "id": "2",
            "name": "Successful"
        },
        {
            "id": "3",
            "name": "Terminated"
        }
    
    
        ];

    $scope.types = [
    {
        "id": "1",
        "name": "New sale"
    },
    {
        "id": "2",
        "name": "Renewal"
    }

    ];

    $scope.projectCat = {
        "catID": "0",

    };

    $scope.cats = [{
        "id": "0",
        "name": "Lead"
    },
    {
        "id": "1",
        "name": "Deal"
    },
    {
        "id": "2",
        "name": "Lost case"
    }

    ];


    $scope.editcomname = $modalInstance.leadproject.companyName;
    $scope.leadstartdate = $modalInstance.leadproject.startDate;
    $scope.leadenddate = $modalInstance.leadproject.closingDate;
    $scope.leadremarks = $modalInstance.leadproject.remarks;
    $scope.leadValue = $modalInstance.leadproject.value;
    $scope.leadStage = $modalInstance.leadproject.salesStage;
    $scope.leadproject.typeID = $modalInstance.leadproject.type;

    /*
   $scope.leadsalesPerson = $modalInstance.leadproject.pincharge;    
$scope.lead.statusID = $modalInstance.leadproject.status;
write if else for tender scope;

**/
    $scope.EditRow = function () {
        /**call to update database */

    };


    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);





app.controller('forCloseEditdeal', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.dealcomname = $modalInstance.dealproject.companyName;
    $scope.dealstartdate = $modalInstance.dealproject.startDate;
    $scope.dealenddate = $modalInstance.dealproject.closingDate;
    $scope.dealRemarks = $modalInstance.dealproject.remarks;
    $scope.types = [
        {
            "id": "1",
            "name": "New sale"
        },
        {
            "id": "2",
            "name": "Renewal"
        }
    
        ];

    $scope.EditRow = function () {
        /**call to update database */
    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);
app.controller('forCloseEditlostcase', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.types = [
        {
            "id": "1",
            "name": "New sale"
        },
        {
            "id": "2",
            "name": "Renewal"
        }
    
        ];

    $scope.EditRow = function () {
        /**call to update database */
    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

/** for now its not required
app.controller('forCloseContact', ['$scope', '$modalInstance', function ($scope, $modalInstance) {


    $scope.companies = [
    {
        "id": "114",

        "name": "Company 1"
    },
    {
        "id": "126",

        "name": "Company 2"
    },
    {
        "id": "149",
        "name": "Company 3"
    }];

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);
*/

app.controller('forCloseSalesperson', ['$scope', '$modalInstance', function ($scope, $modalInstance) {


    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

app.controller('forCloseMultipledelete', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete Projects";
    $scope.deleteMessage = "Are you sure to delete the selected projects?";

    $scope.removeSelectedRows = function () {
        var rows = $modalInstance.list;
        var numbers = $modalInstance.list.length;
        for (var i = 0; i < numbers; i++) {
            angular.forEach($scope.rows, function (value) {
                if (value.No == rows[i]) {
                    var index = $scope.rows.indexOf(value);
                    $scope.rows.splice(index, 1);
                }


            });
        }

    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
        $scope.projecttable.projects = 0;
    };


}]);

app.controller('forCloseMultipledeleteErrormessage', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete Projects";
    $scope.deleteErrorMessage = "No project is selected. Please select the projects first.";
    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

/**contact modal controllers */
app.controller('forCloseEditcont', ['$scope', '$modalInstance', function ($scope, $modalInstance) {


    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

app.controller('forCloseDeletecont', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeader = "Delete a Contact";
    $scope.deleteTitle = "Are you sure to delete this contact?";
    $scope.removeRow = function () {
        var currentid = $modalInstance.contlist;
        var index = $scope.contacts.indexOf(currentid);
        $scope.contacts.splice(index, 1);
    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

app.controller('forCloseMultipledeletecontErrormessage', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete a Contact";
    $scope.deleteErrorMessage = "No contact is selected. Please select the contacts first.";
    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

app.controller('forCloseMultiplecontdelete', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete Contacts";
    $scope.deleteMessage = "Are you sure to delete the selected contacts?";

    $scope.removeSelectedRows = function () {
        var rows = $modalInstance.list;
        var numbers = $modalInstance.list.length;
        for (var i = 0; i < numbers; i++) {
            angular.forEach($scope.contacts, function (value) {
                if (value.No == rows[i]) {
                    var index = $scope.contacts.indexOf(value);
                    $scope.contacts.splice(index, 1);
                }


            });
        }

    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
        $scope.contacttable.contacts = 0;
    };


}]);

/**company modal controllers */
app.controller('forCloseEditcomp', ['$scope', '$modalInstance', function ($scope, $modalInstance) {


    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

app.controller('forCloseDeletecomp', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeader = "Delete a Company";
    $scope.deleteTitle = "Deleting this company will delete all the related projects and contacts. Do you want to proceed?";
    $scope.removeRow = function () {
        var currentid = $modalInstance.comlist;
        var index = $scope.companylist.indexOf(currentid);
        $scope.companylist.splice(index, 1);
    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);


app.controller('forCloseMultipledeletecompErrormessage', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete Companies";
    $scope.deleteErrorMessage = "No company is selected. Please select the companies first.";
    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);


app.controller('forCloseMultiplecompdelete', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete Companies";
    $scope.deleteMessage = "Deleting these companies will delete all the related project and contacts. Do you want to proceed?";

    $scope.removeSelectedRows = function () {
        var rows = $modalInstance.list;
        var numbers = $modalInstance.list.length;
        for (var i = 0; i < numbers; i++) {
            angular.forEach($scope.companylist, function (value) {
                if (value.No == rows[i]) {
                    var index = $scope.companylist.indexOf(value);
                    $scope.companylist.splice(index, 1);
                }


            });
        }

    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
        $scope.companytable.companylist = 0;
    };


}]);



/**company modal controllers */
app.controller('forCloseEditpers', ['$scope', '$modalInstance', function ($scope, $modalInstance) {


    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);

app.controller('forCloseDeletepers', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeader = "Delete a Sales Person";
    $scope.deleteTitle = "Are you sure to delete this sales person?";
    $scope.removeRow = function () {
        var currentid = $modalInstance.list;
        var index = $scope.spersonlist.indexOf(currentid);
        $scope.spersonlist.splice(index, 1);
    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);


app.controller('forCloseMultipledeletepersErrormessage', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete Sales Persons";
    $scope.deleteErrorMessage = "No sales person is selected. Please select the sales persons first.";
    $scope.close = function () {
        $modalInstance.dismiss('cancel');
    };


}]);


app.controller('forCloseMultiplepersdelete', ['$scope', '$modalInstance', function ($scope, $modalInstance) {
    $scope.deleteHeaderrows = "Delete Sales Persons";
    $scope.deleteMessage = "Are you sure to delete the selected sales persons?";

    $scope.removeSelectedRows = function () {
        var rows = $modalInstance.list;
        var numbers = $modalInstance.list.length;
        for (var i = 0; i < numbers; i++) {
            angular.forEach($scope.spersonlist, function (value) {
                if (value.No == rows[i]) {
                    var index = $scope.spersonlist.indexOf(value);
                    $scope.spersonlist.splice(index, 1);
                }


            });
        }

    };

    $scope.close = function () {
        $modalInstance.dismiss('cancel');
        $scope.spersontable.spersonlist = 0;
    };


}]);

