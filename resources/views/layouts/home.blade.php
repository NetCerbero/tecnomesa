@extends('template')
@section('style')

@endsection
@section('title')

@endsection
@section('content')
<div class="row">
               <div class="col-xl-3 col-md-6">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left"><em class="icon-cloud-upload fa-3x"></em></div>
                     <div class="col-8 py-3 bg-primary rounded-right">
                        <div class="h2 mt-0">1700</div>
                        <div class="text-uppercase">Uploads</div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-purple-dark justify-content-center rounded-left"><em class="icon-globe fa-3x"></em></div>
                     <div class="col-8 py-3 bg-purple rounded-right">
                        <div class="h2 mt-0">700<small>GB</small></div>
                        <div class="text-uppercase">Quota</div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-6 col-md-12">
                  <!-- START card-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left"><em class="icon-bubbles fa-3x"></em></div>
                     <div class="col-8 py-3 bg-green rounded-right">
                        <div class="h2 mt-0">500</div>
                        <div class="text-uppercase">Reviews</div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-6 col-md-12">
                  <!-- START date widget-->
                  <div class="card flex-row align-items-center align-items-stretch border-0">
                     <div class="col-4 d-flex align-items-center bg-green justify-content-center rounded-left">
                        <div class="text-center">
                           <!-- See formats: https://docs.angularjs.org/api/ng/filter/date-->
                           <div class="text-sm" data-now="" data-format="MMMM"></div><br>
                           <div class="h2 mt-0" data-now="" data-format="D"></div>
                        </div>
                     </div>
                     <div class="col-8 py-3 rounded-right">
                        <div class="text-uppercase" data-now="" data-format="dddd"></div><br>
                        <div class="h2 mt-0" data-now="" data-format="h:mm"></div>
                        <div class="text-muted text-sm" data-now="" data-format="a"></div>
                     </div>
                  </div><!-- END date widget-->
               </div>
            </div><!-- END cards box-->
            <div class="row">
               <!-- START dashboard main content-->
               <div class="col-xl-9">
                  <!-- START chart-->
                  <div class="row">
                     <div class="col-xl-12">
                        <!-- START card-->
                        <div class="card card-default card-demo" id="cardChart9">
                           <div class="card-header"><a class="float-right" href="#" data-tool="card-refresh" data-toggle="tooltip" title="Refresh card"><em class="fas fa-sync"></em></a><a class="float-right" href="#" data-tool="card-collapse" data-toggle="tooltip" title="Collapse card"><em class="fa fa-minus"></em></a>
                              <div class="card-title">Inbound visitor statistics</div>
                           </div>
                           <div class="card-wrapper">
                              <div class="card-body">
                                 <div class="chart-spline flot-chart"></div>
                              </div>
                           </div>
                        </div><!-- END card-->
                     </div>
                  </div><!-- END chart-->
                  
                           <!-- START card footer-->
                           <div class="card-footer">
                              <div class="input-group"><input class="form-control form-control-sm" type="text" placeholder="Search message .."><span class="input-group-btn"><button class="btn btn-secondary btn-sm" type="submit"><i class="fa fa-search"></i></button></span></div>
                           </div><!-- END card-footer-->
                        </div>
                     </div>
                  </div>
               </div><!-- END dashboard main content-->
               <!-- START dashboard sidebar-->
               
            </div>
@endsection
@section('script')

@endsection