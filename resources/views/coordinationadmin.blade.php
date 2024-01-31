@extends('layouts.app')
@section('content')
 <!-- partial -->
 <div class="container">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            {{-- <img src="../images/faces/face11.html" class="img-lg rounded" alt="profile image"/> --}}
                            <div class="ml-3">
                                <h6>Total Projects</h6>
                                <p class="text-muted">{{0}}</p>
                                {{-- <p class="mt-2 text-primary font-weight-bold">Designer</p> --}}
                                <a href="text-success">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            {{-- <img src="../images/faces/face9.jpg" class="img-lg rounded" alt="profile image"/> --}}
                            <div class="ml-3">
                                <h6>Total Task </h6>
                                <p class="text-muted">{{0}}</p>
                                {{-- <p class="mt-2 text-primary font-weight-bold">Developer</p> --}}
                                <a href="text-primary">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $user= DB::table('users')->count();
            @endphp

            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            {{-- <img src="../images/faces/face12.jpg" class="img-lg rounded" alt="profile image"/> --}}
                            <div class="ml-3">
                                <h6>Total Users</h6>
                                <p class="text-muted">{{$user}}</p>
                                {{-- <p class="mt-2 text-primary font-weight-bold">View More</p> --}}
                                <a class="text-success" href="">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            {{-- <img src="../images/faces/face12.jpg" class="img-lg rounded" alt="profile image"/> --}}
                            <div class="ml-3">
                                <h6>Total Clients</h6>
                                <p class="text-muted">{{0}}</p>
                                {{-- <p class="mt-2 text-primary font-weight-bold">Tester</p> --}}
                                <a class="text-success" href="">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">




            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Project Statistics</h4>
                        <ul class="solid-bullet-list">
                            <li>
                                <h6>Ongoing</h6>
                                <p>0 </p>

                            </li>
                            <li>
                                <h6>Started</h6>
                                <p>0 </p>

                            </li>
                            <li>
                                <h6>Default</h6>
                                <p>0 </p>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Task Statistics</h4>
                        <ul class="solid-bullet-list">
                            <li>
                                <h6>ONGOING</h6>
                                <p>0 </p>

                            </li>
                            <li>
                                <h6>Started</h6>
                                <p>0 </p>

                            </li>
                            <li>
                                <h6>Promotion</h6>
                                <p>0 </p>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Todos</h4>
                        <ul class="solid-bullet-list">
                            <li>
                                <h6>Ongoing</h6>
                                <p>0 </p>

                            </li>
                            <li>
                                <h6>Started</h6>
                                <p>0 </p>

                            </li>
                            <li>
                                <h6>Default</h6>
                                <p>0 </p>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../partials/_footer.html -->
    {{-- <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{now()}} <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
      </div>
    </footer> --}}
    <!-- partial -->
  </div>
  <!-- main-panel ends -->



@endsection
