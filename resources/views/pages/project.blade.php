@extends('layouts.app')
@section('content')
    <section id="defaultprojectview" class="project" ng-class="{visible:show}">
        <div>
            <h1 class="sectiontitle">{{projectTitle}}</h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <form action="" class="search-form">
                    <div class="form-group has-feedback" style="position:relative;left:425px;top:18px;">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="search" id="filterText" ng-model="searchData" ng-change="checkLength()" placeholder="Search"
                            style="font-family:sans-serif">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="tablevisibility" ng-class="{tablevisible:showprojecttable}">
            <div class="table-wrapper projectTable">
                <table class="table table-condensed table-bordered table-striped table-responsive table-hover">
                    <thead>
                        <tr>

                            <th style="text-align:right;width:150px;"> No.
                                <a href="#" ng-click="sort('No')" class="sortDir" ng-class="{ active: isSorted('No') }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-No')" class="sortDir" ng-class="{ active: isSorted('-No' ) }">&#x25BC;</a>
                            </th>

                            <th>Company name

                                <a href="#" ng-click="sort('companyName')" class="sortDir" ng-class="{ active: isSorted('companyName' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-companyName')" class="sortDir" ng-class="{ active: isSorted('-companyName' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colContactPerson">Contact person</th>
                            <th ng-if="colEmail">Email</th>
                            <th ng-if="colPhone">Phone</th>
                            <th ng-if="colIndustry">Industry</th>
                            <th ng-if="colProduct">Product</th>
                            <th ng-if="colValue">Value
                                <a href="#" ng-click="sort('-value')" class="sortDir" ng-class="{ active: isSorted('-value' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('value')" class="sortDir" ng-class="{ active: isSorted('value' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colType">Type</th>
                            <th ng-if="colCategory">Category</th>
                            <th ng-if="colStartdate">Start date
                                <a href="#" ng-click="sort('startDate')" class="sortDir" ng-class="{ active: isSorted('startDate' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-startDate')" class="sortDir" ng-class="{ active: isSorted('-startDate' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colClosingdate">Closing date</th>
                            <th ng-if="colSalesstage">Sales stage</th>
                            <th ng-if="colLastupdate">Last update</th>
                            <th ng-if="colRemarks" style="width:250px;">Remarks</th>
                        </tr>

                    </thead>
                    <tbody ng-controller="MyControllerModal">

                        <tr class="paginationclass" ng-repeat="proj in (filteredRows = (rows| orderBy:predicate:reverse | filter:searchData | pagination: curPage * pageSize | limitTo: pageSize))">
                            <td style="text-align:right;">
                                <div style="float:left;">
                                    <input type="checkbox" name="rowID" class="squaredFour" checklist-model="projecttable.projects" checklist-value="proj.No"
                                        style="position:relative;top:-1px;" />
                                    <a href="#" ng-click="openEdit('sm',proj)">
                                        <span class="fa fa-pencil-square-o" style="font-size:19px;color:#4E4EFD ;position:relative;top:-2px;margin-left:3px;" popover="Edit this project"
                                            popover-trigger="mouseenter" popover-placement="right"></span>
                                    </a>
                                    <a href="#" ng-click="openDelete('sm',proj)">
                                        <span class="fa fa-trash" id="rowtrashhover" style="font-size:19px;color:#4E4EFD;position:relative;top:-3px;margin-left:3px;"
                                            popover="Delete this project" popover-trigger="mouseenter" popover-placement="right"></span>
                                    </a>
                                </div>
                                {{proj.No}}
                            </td>

                            <td>{{proj.companyName}}</td>
                            <td ng-if="colContactPerson">{{proj.contactPerson}}</td>
                            <td ng-if="colEmail">{{proj.email}}</td>
                            <td ng-if="colPhone">{{proj.phone}}</td>
                            <td ng-if="colIndustry">{{proj.industry}}</td>
                            <td ng-if="colProduct">{{proj.product}}</td>
                            <td ng-if="colValue">{{proj.value}}</td>
                            <td ng-if="colType">{{proj.type}}</td>
                            <td ng-if="colCategory">{{proj.category}}</td>
                            <td ng-if="colStartdate">{{proj.startDate}}</td>
                            <td ng-if="colClosingdate">{{proj.closingDate}}</td>
                            <td ng-if="colSalesstage">{{proj.salesStage}}</td>
                            <td ng-if="colLastupdate">{{proj.lastUpdate}}</td>
                            <td ng-if="colRemarks">{{proj.remarks}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--pagination buttons!-->
            <div class="row1">
                <div class="pagination pagination-centered" ng-show="rows.length">
                    <ul class="pagination-controle pagination">
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="curPage == 0" ng-click="curPage=curPage-1"> &lt; &lt;</button>
                        </li>
                        <li>
                            <span id="pagenumbers">Page {{curPage + 1}} of {{ numberOfPages() }}</span>
                        </li>
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="(curPage >= numberOfPages() - 1) || (filteredRows.length < pageSize)"
                                ng-click="curPage = curPage+1">&gt;&gt;</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- lead table !-->
        <div class="tablevisibility" ng-class="{tablevisible:showleadtable}">
            <div class="table-wrapper projectTable">
                <table class="table table-hover table-bordered table-responsive">
                    <thead>
                        <tr>

                            <th style="text-align:right"> No.
                                <a href="#" ng-click="sort('No')" class="sortDir" ng-class="{ active: isSorted('No') }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-No')" class="sortDir" ng-class="{ active: isSorted('-No' ) }">&#x25BC;</a>
                            </th>

                            <th>Company name

                                <a href="#" ng-click="sort('companyName')" class="sortDir" ng-class="{ active: isSorted('companyName' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-companyName')" class="sortDir" ng-class="{ active: isSorted('-companyName' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colContactPerson">Contact person</th>
                            <th ng-if="colEmail">Email</th>
                            <th ng-if="colPhone">Phone</th>
                            <th ng-if="colIndustry">Industry</th>
                            <th ng-if="colProduct">Product</th>
                            <th ng-if="colValue">Value
                                <a href="#" ng-click="sort('-value')" class="sortDir" ng-class="{ active: isSorted('-value' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('value')" class="sortDir" ng-class="{ active: isSorted('value' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colType">Type</th>
                            <th ng-if="colCategory">Category</th>
                            <th ng-if="colStartdate">Start date
                                <a href="#" ng-click="sort('startDate')" class="sortDir" ng-class="{ active: isSorted('startDate' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-startDate')" class="sortDir" ng-class="{ active: isSorted('-startDate' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colClosingdate">Closing date</th>
                            <th ng-if="colSalesstage">Sales stage</th>
                            <th ng-if="colLastupdate">Last update</th>
                            <th ng-if="colPersonincharge">Person in charge</th>
                            <th ng-if="colStatus">Status</th>
                            <th ng-if="colTender">Tender</th>
                            <th ng-if="colRemarks">Remarks</th>
                        </tr>

                    </thead>
                    <!--
                            <tbody ng-controller="MyControllerModal">

                                <tr>
                                    <td style="text-align:right;">
                                        <div style="float:left;">
                                            <input type="checkbox" name="rowID" class="squaredFour" style="position:relative;top:-1px;" />
                                            <a href="#">
                                                <span class="fa fa-pencil-square-o" style="font-size:19px;color:#4E4EFD ;position:relative;top:-2px;"></span>
                                            </a>
                                            <a href="#" ng-click="openDelete('sm',proj)">
                                                <span class="fa fa-trash" id="rowtrashhover" style="font-size:19px;color:#4E4EFD;position:relative;top:-3px;"></span>
                                            </a>
                                        </div>
                            
                                    </td>

                                    <td></td>
                                    <td ng-if="colContactPerson"></td>
                                    <td ng-if="colEmail"></td>
                                    <td ng-if="colPhone"></td>
                                    <td ng-if="colIndustry"></td>
                                    <td ng-if="colProduct"></td>
                                    <td ng-if="colValue"></td>
                                    <td ng-if="colType"></td>
                                    <td ng-if="colCategory"></td>
                                    <td ng-if="colStartdate"></td>
                                    <td ng-if="colClosingdate"></td>
                                    <td ng-if="colSalesstage"></td>
                                    <td ng-if="colLastupdate"></td>
                                    <td ng-if="colPersonincharge"></td>
                                    <td ng-if="colStatus">Status</td>
                                    <td ng-if="colTender">Tender</td>
                                    <td ng-if="colRemarks"></td>
                                </tr>
                            </tbody>  
                            !-->
                </table>
            </div>
            <div class="row1">
                <div class="pagination pagination-centered" ng-show="rows.length">
                    <ul class="pagination-controle pagination">
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="curPage == 0" ng-click="curPage=curPage-1"> &lt; &lt;</button>
                        </li>
                        <li>
                            <span id="pagenumbers">Page {{curPage + 1}} of {{ numberOfPages() }}</span>
                        </li>
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="(curPage >= numberOfPages() - 1) || (filteredRows.length < pageSize)"
                                ng-click="curPage = curPage+1">&gt;&gt;</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Deal table !-->
        <div class="tablevisibility" ng-class="{tablevisible:showdealtable}">
            <div class="table-wrapper projectTable">
                <table class="table table-hover table-bordered table-responsive">
                    <thead>
                        <tr>

                            <th style="text-align:right"> No.
                                <a href="#" ng-click="sort('No')" class="sortDir" ng-class="{ active: isSorted('No') }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-No')" class="sortDir" ng-class="{ active: isSorted('-No' ) }">&#x25BC;</a>
                            </th>

                            <th>Company name

                                <a href="#" ng-click="sort('companyName')" class="sortDir" ng-class="{ active: isSorted('companyName' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-companyName')" class="sortDir" ng-class="{ active: isSorted('-companyName' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colContactPerson">Contact person</th>
                            <th ng-if="colEmail">Email</th>
                            <th ng-if="colPhone">Phone</th>
                            <th ng-if="colIndustry">Industry</th>
                            <th ng-if="colProduct">Product</th>
                            <th ng-if="colValue">Value
                                <a href="#" ng-click="sort('-value')" class="sortDir" ng-class="{ active: isSorted('-value' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('value')" class="sortDir" ng-class="{ active: isSorted('value' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colType">Type</th>
                            <th ng-if="colCategory">Category</th>
                            <th ng-if="colStartdate">Start date
                                <a href="#" ng-click="sort('startDate')" class="sortDir" ng-class="{ active: isSorted('startDate' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-startDate')" class="sortDir" ng-class="{ active: isSorted('-startDate' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colClosingdate">Closing date</th>
                            <th ng-if="colSalesstage">Sales stage</th>
                            <th ng-if="colLastupdate">Last update</th>
                            <th ng-if="colPersonincharge">Person in charge</th>
                            <th ng-if="colPOnum">PO-number</th>
                            <th ng-if="colPOdate">PO-date</th>
                            <th ng-if="colRemarks">Remarks</th>
                        </tr>

                    </thead>
                    <!--
                            <tbody ng-controller="MyControllerModal">

                                <tr>
                                    <td style="text-align:right;">
                                        <div style="float:left;">
                                            <input type="checkbox" name="rowID" class="squaredFour" style="position:relative;top:-1px;" />
                                            <a href="#">
                                                <span class="fa fa-pencil-square-o" style="font-size:19px;color:#4E4EFD ;position:relative;top:-2px;"></span>
                                            </a>
                                            <a href="#" ng-click="openDelete('sm',proj)">
                                                <span class="fa fa-trash" id="rowtrashhover" style="font-size:19px;color:#4E4EFD;position:relative;top:-3px;"></span>
                                            </a>
                                        </div>
                            
                                    </td>

                                    <td></td>
                                    <td ng-if="colContactPerson"></td>
                                    <td ng-if="colEmail"></td>
                                    <td ng-if="colPhone"></td>
                                    <td ng-if="colIndustry"></td>
                                    <td ng-if="colProduct"></td>
                                    <td ng-if="colValue"></td>
                                    <td ng-if="colType"></td>
                                    <td ng-if="colCategory"></td>
                                    <td ng-if="colStartdate"></td>
                                    <td ng-if="colClosingdate"></td>
                                    <td ng-if="colSalesstage"></td>
                                    <td ng-if="colLastupdate"></td>
                                    <td ng-if="colPersonincharge"></td>
                                    <td ng-if="colPOnum">Status</td>
                                    <td ng-if="colPOdate">Tender</td>
                                    <td ng-if="colRemarks"></td>
                                </tr>
                            </tbody>  
                            !-->
                </table>
            </div>
            <div class="row1">
                <div class="pagination pagination-centered" ng-show="rows.length">
                    <ul class="pagination-controle pagination">
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="curPage == 0" ng-click="curPage=curPage-1"> &lt; &lt;</button>
                        </li>
                        <li>
                            <span id="pagenumbers">Page {{curPage + 1}} of {{ numberOfPages() }}</span>
                        </li>
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="(curPage >= numberOfPages() - 1) || (filteredRows.length < pageSize)"
                                ng-click="curPage = curPage+1">&gt;&gt;</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- lostcase table !-->
        <div class="tablevisibility" ng-class="{tablevisible:showlostcasetable}">
            <div class="table-wrapper projectTable">
                <table class="table table-hover table-bordered table-responsive">
                    <thead>
                        <tr>

                            <th style="text-align:right"> No.
                                <a href="#" ng-click="sort('No')" class="sortDir" ng-class="{ active: isSorted('No') }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-No')" class="sortDir" ng-class="{ active: isSorted('-No' ) }">&#x25BC;</a>
                            </th>

                            <th>Company name

                                <a href="#" ng-click="sort('companyName')" class="sortDir" ng-class="{ active: isSorted('companyName' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-companyName')" class="sortDir" ng-class="{ active: isSorted('-companyName' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colContactPerson">Contact person</th>
                            <th ng-if="colEmail">Email</th>
                            <th ng-if="colPhone">Phone</th>
                            <th ng-if="colIndustry">Industry</th>
                            <th ng-if="colProduct">Product</th>
                            <th ng-if="colValue">Value
                                <a href="#" ng-click="sort('-value')" class="sortDir" ng-class="{ active: isSorted('-value' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('value')" class="sortDir" ng-class="{ active: isSorted('value' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colType">Type</th>
                            <th ng-if="colCategory">Category</th>
                            <th ng-if="colStartdate">Start date
                                <a href="#" ng-click="sort('startDate')" class="sortDir" ng-class="{ active: isSorted('startDate' ) }">&#x25B2;</a>
                                <a href="#" ng-click="sort('-startDate')" class="sortDir" ng-class="{ active: isSorted('-startDate' ) }">&#x25BC;</a>
                            </th>
                            <th ng-if="colClosingdate">Closing date</th>
                            <th ng-if="colSalesstage">Sales stage</th>
                            <th ng-if="colLastupdate">Last update</th>
                            <th ng-if="colRemarks">Remarks</th>
                        </tr>

                    </thead>
                    <!-- same to projetable tobody
                            <tbody ng-controller="MyControllerModal">

                            
                            !-->
                </table>
            </div>
            <div class="row1">
                <div class="pagination pagination-centered" ng-show="rows.length">
                    <ul class="pagination-controle pagination">
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="curPage == 0" ng-click="curPage=curPage-1"> &lt; &lt;</button>
                        </li>
                        <li>
                            <span id="pagenumbers">Page {{curPage + 1}} of {{ numberOfPages() }}</span>
                        </li>
                        <li>
                            <button type="button" class="btn btn-primary" ng-disabled="(curPage >= numberOfPages() - 1) || (filteredRows.length < pageSize)"
                                ng-click="curPage = curPage+1">&gt;&gt;</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>




        <div class="dropdown" style="position:fixed;top:14.2%; left:1225px;">
            <a href="" data-toggle="dropdown" class="dropdown-toggle" popover="Filter of table contents" popover-trigger="mouseenter"
                popover-placement="bottom" ng-click="resetForm('filterForm')" id="showcontentdropdown">
                <span class="glyphicon glyphicon-filter" style="font-size:28px;color:#4E4EFD"></span>
            </a>

            <div class="dropdown-menu" style="width:330px;height:310px;" id="contentdropdown">
                <p>Please select the filtering option.</p>
                <form id="filterForm" name="filterForm">
                    <div style="position:absolute; top:70px;left:20px;">
                        <input type="checkbox" class="checkbox-default" ng-model="filterForm.deal" ng-click="checkboxRule1('deal')" />
                        <label for="checkbox">Deals</label>
                        <br>
                        <input type="checkbox" class="checkbox-default" ng-model="filterForm.lead" ng-click="checkboxRule1('lead')" />
                        <label for="checkbox">Leads</label>
                        <br>
                        <input type="checkbox" name="lostCases" class="checkbox-default" ng-model="filterForm.lostCase" ng-click="checkboxRule1('lostCase')"
                        />
                        <label for="checkbox">Lost cases</label>
                        <br>
                        <input type="checkbox" name="date" class="checkbox-default" ng-model="filterForm.date" ng-click="resetDate(); checkboxRule1('date')"
                        />
                        <label for="checkbox">Date</label>
                        <br>
                        <div ng-show="filterForm.date">
                            <div class="datepicker mainpagedatepicker" date-format="dd/MM/yyyy">
                                <input class="maindateWidth form-control" ng-model="startdate" type="text" placeholder="Start date">
                                <i class="fa fa-calendar fafaPosititionondatepicker1"></i>
                                </input>
                            </div>
                            <div class="datepicker mainpagedatepicker" date-format="dd/MM/yyyy">
                                <input class="maindateWidth form-control" ng-model="enddate" type="text" placeholder="End date">
                                <i class="fa fa-calendar fafaPosititionondatepicker1"></i>
                                </input>
                            </div>
                        </div>
                    </div>
                    <div style="position:absolute; top:270px;left:35px;">
                        <button type="button" class="btn-default btndef hidedropdown1" ng-click="filterContent()">Apply</button>
                        <button type="button" class="btn-default btndef hidedropdown1" ng-click="setDefault()">Show all</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="dropdown" style="top:13.8%; left:1270px;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle" popover="Filter of table columns" popover-trigger="mouseenter"
                popover-placement="bottom" ng-click="resetForm('columnForm'); checkCategory()" id="showcolumndropdown">
                <i class="fa fa-columns " style="font-size:33px;color:#4E4EFD"></i>
            </a>
            <div class="dropdown-menu" style="width:330px;height:420px;" id="columndropdown">

                <p>Please select the columns you want to see in the table.</p>

                <form id="columnForm" name="columnForm">
                    <div style="position:absolute; top:90px;left:20px;">
                        <span ng-repeat="column in columns |limitTo:9:0">
                            <div>
                                <input type="checkbox" checklist-model="defaulttable.columns" checklist-value="column.id" ng-disabled="column.disabled" />
                                <label>{{column.name}}</label>
                        </span>

                        </div>
                    </div>

                    <div style="position:absolute; top:90px;left:175px;">
                        <span ng-repeat="column in columns |limitTo:10:9">
                            <div>
                                <input type="checkbox" checklist-model="defaulttable.columns" checklist-value="column.id" ng-disabled="column.disabled" />
                                <label>{{column.name}}</label>
                        </span>
                        </div>
                    </div>
                    <div style="position:absolute; top:375px;left:35px;">
                        <button type="button" class="btn-default btndef hidedropdown2" ng-click="filtertablecolumns(defaulttable.columns.length,defaulttable.columns)">Apply</button>
                        <button type="button" class="btn-default btndef hidedropdown2" ng-click="setTabletoDefault()">Original Format</button>
                    </div>
            </div>

            </form>

        </div>
        <div ng-controller="MyControllerModal">
            <a href="#" ng-click="openmultipledelete(projecttable.projects)" popover="Delete multiple projects" popover-trigger="mouseenter"
                popover-placement="left">
                <i class="fa fa-trash" style="position:fixed;top:13.5%;left:1320px;font-size:35px;color:#4E4EFD"></i>
            </a>
        </div>

    </section>
@endsection