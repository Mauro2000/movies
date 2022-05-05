@extends('admin.layouts.dashboards.app')

@section('title')
    ola
@endsection

@section('content')
    <section class="section">
        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Filmes</h5>
                              <h2 class="mb-3 font-20">{{$movies}}</h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="{{asset('images/movieicon.png')}}" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Series</h5>
                              <h2 class="mb-3 font-20">{{$series}}</h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="{{asset('images/seriesicon.png')}}" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Documentarios</h5>
                              <h2 class="mb-3 font-20">0</h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="{{asset('images/documentaryicon.png')}}" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Kids</h5>
                              <h2 class="mb-3 font-20">0</h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="{{asset('images/kidsicon.png')}}" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Notificações</h5>
                              @if ($user->unreadnotifications->count())
                                <h2 class="mb-3 font-20">{{$user->unreadnotifications->count()}}</h2>
                                @else
                                <h2 class="mb-3 font-20">0</h2>

                              @endif


                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="{{asset('images/notificationicon.png')}}" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-30">Utilizadores</h5>
                              <h2 class="mb-3 font-20">{{$users}}</h2>

                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="{{asset('images/usersicon.png')}}" width="110" height="110" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

    </section>
@endsection

@section('scripts')

@endsection
