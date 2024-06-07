<div class="section bg-light">




    <h2 class="heading mb-5 text-center">Beberapa Testimoni</span>

        </span>
</div>
</div>

<div class="wide-slider-testimonial-wrap">
    <div class="wide-slider-testimonial">
        @foreach ($testimonies as $testimony)
            <div class="item">
                <blockquote class="block-testimonial">
                    <div class="author">
                        <img src="@if ($testimony->contributor && $testimony->contributor->image) {{ Storage::url($testimony->contributor->image) }}
                    @else
                    {{ asset('Template/dist/img/profile.jpeg') }} @endif"
                            alt="Free template by TemplateUX">
                        <h3>{{ $testimony->contributor->name }}</h3>
                        @if ($testimony->destination_id != null)
                            @php
                                $data = \App\Models\destination::find($testimony->destination_id);
                            @endphp
                        @elseif($testimony->restaurant_id != null)
                            @php
                                $data = \App\Models\Restaurant::find($testimony->restaurant_id);
                            @endphp
                        @endif
                        <p class="position mb-5">
                            {{$data->name}}
                        </p>
                    </div>
                    <p>
                    <div class="quote">&ldquo;</div>
                    &ldquo;{{ $testimony->description }}&rdquo;</p>
                </blockquote>
            </div>
        @endforeach

    </div>
</div>

</div> <!-- /.untree_co-section -->
