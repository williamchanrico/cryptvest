@extends('layouts.dashboard')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('header')
	{{ trans('auth.loggedIn', ['name' => Auth::user()->name]) }}
@endsection

@section('breadcrumbs')

	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="{{url('/')}}">
			<span itemprop="name">
				{{ trans('titles.app') }}
			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>
	<li class="active">
		{{ trans('titles.dashboard') }}
	</li>

@endsection

@section('head')
    {{--Morris Chart--}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')

	@if(empty($coins) || count($coins) <= 0)
		<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell margin-top-0-important mdl-cell--6-col mdl-cell--6-col-tablet mdl-cell--6-col-desktop mdl-cell--3-offset">
			@include('panels.welcome-panel')
		</div>
	@else
		@include('panels.statistic-panel')
	@endif

@endsection

@section('footer_scripts')
    @if(!empty($coins))
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script>
            var colorCounter = 0;
            var colors = [
                '#FFB300',
                '#AB47BC',
                '#536DFE',
                '#4DB6AC',
                '#EC407A',
                '#795548',
                '#263238',
                '#DAF7A6'
            ];

            Morris.Donut({
                element: 'donut-coins-type-breakdown',
                data: [
                    @foreach($coins as $coin)
                        {label: "{{ $coin['name'] }}", value: {{ round($coin['cost'] / $totalInvested * 100) }} },
                    @endforeach
                ],
                colors: colors,
                formatter: function (x) { return x + "%"},
                resize: true

            });

            Morris.Bar({
                element: 'donut-coins-cost-breakdown',
                data: [
                    @foreach($coins as $coin)
                        {x: '{{ $coin['name'] }}', y: {{ $coin['cost'] }} },
                    @endforeach
                ],
                xkey: 'x',
                ykeys: ['y'],
                labels: ['USD'],
                barColors: function (row, series, type) {
                    if (type === 'bar') {
                        return colors[(colorCounter++) % colors.length];
                    }
                    else {
                        return '#000';
                    }
                },
                resize: true
            });
        </script>
    @endif
@endsection