@extends('template.app')

@section('judul')
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    Dashboard
                </h4>
            </div>
        </div>
        <div class="row ">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active s-12" href="#">Today</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link s-12" href="#">Yesterday</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link s-12" href="#">By Date</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link s-12" href="#">By Progress</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row p-t-20">
            <div class="col-lg-3">
                <div class="counter-box white">
                    <div class="p-4">
                        <div class="float-right">
                            <span class="icon icon-note-list text-light-blue s-48"></span>
                        </div>
                        <div class="counter-title">Web Projects</div>
                        <h5 class="sc-counter mt-3">1228</h5>
                    </div>
                    <div class="progress progress-xs r-0">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                             aria-valuemin="0"
                             aria-valuemax="128"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="counter-box white">
                    <div class="p-4">
                        <div class="float-right"><span class="icon icon-mail-envelope-open s-48"></span>
                        </div>
                        <div class="counter-title ">Premium Themes</div>
                        <h5 class="sc-counter mt-3">1228</h5>
                    </div>
                    <div class="progress progress-xs r-0">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25"
                             aria-valuemin="0"
                             aria-valuemax="128"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="white counter-box">
                    <div class="p-4">
                        <div class="float-right"><span class="icon icon-stop-watch3 s-48"></span>
                        </div>
                        <div class="counter-title">Support Requests</div>
                        <h5 class="sc-counter mt-3">1228</h5>
                    </div>
                    <div class="progress progress-xs r-0">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25"
                             aria-valuemin="0"
                             aria-valuemax="128"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="white counter-box">
                    <div class="p-4">
                        <div class="float-right"><span class="icon icon-inbox-document-text s-48"></span>
                        </div>
                        <div class="counter-title">Support Requests</div>
                        <h5 class="sc-counter mt-3">550</h5>
                    </div>
                    <div class="progress progress-xs r-0">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                             aria-valuemin="0"
                             aria-valuemax="128"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-t-20">
            <div class="col-md-12">
                <div class="no-m white">
                    <div class="p-5" style="height: 528px">
                        <canvas
                            data-chart="line"
                            data-dataset="[
                                        [0,528,228,728,528,1628,0],
                                        [0,628,228,1228,428,1828,0],
                                        ]"
                            data-labels="['Blue','Yellow','Green','Purple','Orange','Red','Indigo']"
                            data-dataset-options="[
                                    { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                    { borderColor:  'rgba(255,99,132,1)', backgroundColor: 'rgba(255, 99, 132, 1)' }

                                    ]"
                        >
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-t-b-20">
            <div class="col-md-6">
                <div class="card no-b">
                    <div class="card-header white b-0 p-3">
                        <div class="card-handle">
                            <a data-toggle="collapse" href="#salesCard" aria-expanded="false"
                               aria-controls="salesCard">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                        <h4 class="card-title">Daily Sale Report</h4>
                        <small class="card-subtitle mb-2 text-muted">Items purchase by users.</small>
                    </div>
                    <div class="collapse show" id="salesCard">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover earning-box">
                                    <thead class="bg-light">
                                    <tr>
                                        <th colspan="2">Client Name</th>
                                        <th>Item Purchased</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="w-10"><span class="round">
                                                <img src="assets/img/dummy/u1.png" alt="user"></span>
                                        </td>
                                        <td>
                                            <h6>Sara Kamzoon</h6>
                                            <small class="text-muted">Marketing Manager</small>
                                        </td>
                                        <td>25</td>
                                        <td>$250</td>
                                    </tr>
                                    <tr>
                                        <td class="w-10"><span class="round">
                                                <img src="assets/img/dummy/u2.png" alt="user"></span>
                                        </td>
                                        <td>
                                            <h6>Sara Kamzoon</h6>
                                            <small class="text-muted">Marketing Manager</small>
                                        </td>
                                        <td>25</td>
                                        <td>$250</td>
                                    </tr>
                                    <tr>
                                        <td class="w-10"><span class="round">
                                                <img src="assets/img/dummy/u3.png" alt="user"></span>
                                        </td>
                                        <td>
                                            <h6>Sara Kamzoon</h6>
                                            <small class="text-muted">Marketing Manager</small>
                                        </td>
                                        <td>25</td>
                                        <td>$250</td>
                                    </tr>
                                    <tr>
                                        <td class="w-10"><span class="round">
                                                <img src="assets/img/dummy/u4.png" alt="user"></span>
                                        </td>
                                        <td>
                                            <h6>Sara Kamzoon</h6>
                                            <small class="text-muted">Marketing Manager</small>
                                        </td>
                                        <td>25</td>
                                        <td>$250</td>
                                    </tr>
                                    <tr>
                                        <td class="w-10"><span class="round">
                                                <img src="assets/img/dummy/u5.png" alt="user"></span>
                                        </td>
                                        <td>
                                            <h6>Sara Kamzoon</h6>
                                            <small class="text-muted">Marketing Manager</small>
                                        </td>
                                        <td>25</td>
                                        <td>$250</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card no-b">
                    <div class="card-header white b-0 p-3">
                        <div class="card-handle">
                            <a data-toggle="collapse" href="#invoiceCard" aria-expanded="false"
                               aria-controls="invoiceCard">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                        <h4 class="card-title">Invoices</h4>
                        <small class="card-subtitle mb-2 text-muted">Items purchase by users.</small>
                    </div>
                    <div class="collapse show" id="invoiceCard">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="recent-orders"
                                       class="table table-hover mb-0 ps-container ps-theme-default">
                                    <thead class="bg-light">
                                    <tr>
                                        <th>SKU</th>
                                        <th>Invoice#</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td >PAP-10521</td>
                                        <td ><a href="#">INV-281281</a></td>
                                        <td >Baja Khan</td>
                                        <td ><span class="badge badge-success">Paid</span></td>
                                        <td >$ 1228.28</td>
                                    </tr>
                                    <tr>
                                        <td >PAP-532521</td>
                                        <td ><a href="#">INV-01112</a></td>
                                        <td >Khan Sab</td>
                                        <td ><span class="badge badge-warning">Overdue</span>
                                        </td>
                                        <td >$ 5685.28</td>
                                    </tr>
                                    <tr>
                                        <td >PAP-05521</td>
                                        <td ><a href="#">INV-281012</a></td>
                                        <td >Bin Ladin</td>
                                        <td ><span class="badge badge-success">Paid</span></td>
                                        <td >$ 152.28</td>
                                    </tr>
                                    <tr>
                                        <td >PAP-15521</td>
                                        <td ><a href="#">INV-281401</a></td>
                                        <td >Zoor Shoor</td>
                                        <td ><span class="badge badge-success">Paid</span></td>
                                        <td >$ 1450.28</td>
                                    </tr>
                                    <tr>
                                        <td >PAP-532521</td>
                                        <td ><a href="#">INV-01112</a></td>
                                        <td >Khan Sab</td>
                                        <td ><span class="badge badge-warning">Overdue</span>
                                        </td>
                                        <td >$ 5685.28</td>
                                    </tr>
                                    <tr>
                                        <td >PAP-05521</td>
                                        <td ><a href="#">INV-281012</a></td>
                                        <td >Bin Ladin</td>
                                        <td ><span class="badge badge-success">Paid</span></td>
                                        <td >$ 152.28</td>
                                    </tr>
                                    <tr>
                                        <td >PAP-15521</td>
                                        <td ><a href="#">INV-281401</a></td>
                                        <td >Zoor Shoor</td>
                                        <td ><span class="badge badge-success">Paid</span></td>
                                        <td >$ 1450.28</td>
                                    </tr>
                                    <tr>
                                        <td >PAP-32521</td>
                                        <td ><a href="#">INV-288101</a></td>
                                        <td >Walter R.</td>
                                        <td ><span class="badge badge-warning">Overdue</span>
                                        </td>
                                        <td >$ 685.28</td>
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
@endsection
