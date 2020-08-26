@foreach ($data as $vacancy)
    <div class="vacancies-list-item">
        <div class="vacancies-item-header">
            <div class="vacancies-title">
                <a href="{{url('/vacancy/id'.$vacancy->unique_id)}}"><h3>{{ $vacancy->title}}</h3></a>
                <p>
                    @if ($vacancy->locations->count())
                        @php($countryId = 0)
                        @php($coma = ',')
                        @php($str = '')

                        @foreach ($vacancy->locations as $vacancyLocations)

                            @if ($countryId != $vacancyLocations->country->id)
                                @php($str .= $vacancyLocations->country->title .  $coma)
                           @endif

                           @php($str .= ' ' . (isset($vacancyLocations->city) == true ? $vacancyLocations->city->title : '') . (isset($vacancyLocations->city) == true ? $coma : '') )

                           @php($countryId = $vacancyLocations->country->id)

                       @endforeach

                       {{ substr(trim($str), 0, -1) }}

                    @endif

               </p>

           </div>
           <div class="vacancies-item-btn">
               <a href="#" class="add-customer-popup" onclick="showPopupCustomerList(event, {{ $vacancy->id }}, $('#add-customer'))">Add customer</a>
               <a href="#" class="add-candidate-popup" onclick="getCandidates(event, {{ $vacancy->id }}, $('#add-candidate'))">Add candidate</a>
               <a href="#">Advertise</a>
               <a href="#">Published <i class="fa fa-share-alt"></i></a>
               <span>
                   <img src="{{ asset('img/icons/settings.png') }}" alt="">
                   <ul>
                       <li><a href="#">Add note</a></li>
                       <li><a href="#">Send task</a></li>
                       <li><a href="#">Send welcome message</a></li>
                       <li><a href="#">Send message</a></li>
                   </ul>
                </span>
           </div>
       </div>
       <div class="vacancies-item-details">
           <div class="item-details-block">
               <span class="details-block-number">9</span>
               <p>Sourced</p>
           </div>
           <div class="item-details-block steel">
               <span class="details-block-number">{{ $vacancy->interviewed }}</span>
               <p>Interview</p>
           </div>
           <div class="item-details-block steel">
               <span class="details-block-number">{{ $vacancy->offered }}</span>
               <p>Offer</p>
           </div>
           <div class="item-details-block green">
               <span class="details-block-number">{{ $vacancy->hired }}</span>
               <p>Hired</p>
           </div>
           <div class="item-details-block">
               <div class="vacancies-item-btn customer-item-btn">
                   <a href="{{route('vacancy_edit',['vacancyId' => $vacancy->id])}}">edit</a>
                   <br>
                   <a href="{{route('vacancy_view',['vacancyId' => $vacancy->id])}}">View candidates</a>
               </div>

           </div>
       </div>
       <div class="vacancies-item-footer">
           <div class="vacancies-item-status">
               <i class="fa fa-check"></i>
               Published
           </div>
           <div class="vacancies-item-date">
               <p>Date of Creation {{ \Carbon\Carbon::parse($vacancy->open_at)->format('d.m.Y')}}</p>
           </div>
       </div>
   </div>
@endforeach
