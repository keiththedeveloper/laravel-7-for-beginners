<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    @if (session()->has('message'))
    {{$slot}}
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('message')}}
                        </div>
                        @elseif (session()->has('error'))
                        {{$slot}}
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('message')}}
                        </div>
                        @endif


</div>
