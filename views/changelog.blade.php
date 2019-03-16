@extends('layout')

@section('title', 'Changelog & release history | grocy')
@section('lang', 'de')

@section('headerAdditional')
<link rel="canonical" href="https://grocy.info/changelog">
@stop

@section('content')
<header class="container pt-3 pb-3">
	<div class="row align-items-center">

		<div class="col-xs-12 col-lg-8 offset-lg-2">
			<h1 class="bold sketch-underline">Changelog & release history</h1>
		</div>

	</div>
</header>

<div class="container pb-3">

	@php $Parsedown = new Parsedown(); @endphp
	@foreach($changelog['changelog_items'] as $changelogItem)
	<section class="row align-items-center d-flex my-3">
		<div class="col-xs-12 col-lg-8 offset-lg-2">
			<div class="card">
				<div class="card-header">
					<a class="discrete-link" data-toggle="collapse-next" href="#">Version <span class="font-weight-bold">{{ $changelogItem['version'] }}</span> released on <span class="font-weight-bold">{{ $changelogItem['release_date'] }}</span></a>
				</div>
				<div class="collapse @if($changelogItem['release_number'] >= $changelog['newest_release_number'] - 4) show @endif">
					<div class="card-body text-left flowtext major-info pb-0 px-1">
						{!! $Parsedown->text($changelogItem['body']) !!}
					</div>
					<div class="card-body pt-0">
						<a href="https://releases.grocy.info/v?{{ $changelogItem['version'] }}" target="_blank" class="btn btn-primary">Download</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endforeach
	
</div>
@stop
