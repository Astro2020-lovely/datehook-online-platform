@extends('user.layout.master')

@push('styles')
<link rel="stylesheet" href="{{asset('assets/user/css/compro.css')}}">
@endpush

@section('headertext', 'Complete Your Profile')

@section('content')
  <!--   Big container   -->
  <div class="container">
     <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
           <!-- Wizard container -->
           <div class="wizard-container">
              <div class="card wizard-card" data-color="red" id="wizard">
                 <form action="{{route('user.upComProfile')}}" method="post">
                   {{csrf_field()}}
                   <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                    <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                    <div class="wizard-header">
                       <h5>This informations will help you to find your match.</h5>
                    </div>
                    <div class="wizard-navigation">
                       <ul>
                          <li class="nav-item"><a class="nav-link" href="#details" data-toggle="tab">Basic Details</a></li>
                          <li class="nav-item"><a class="nav-link" href="#captain" data-toggle="tab">Work and Education</a></li>
                          <li class="nav-item"><a class="nav-link" href="#description" data-toggle="tab">Lifestyle Details</a></li>
                          <li class="nav-item"><a class="nav-link" href="#describe" data-toggle="tab">Describe Yourself</a></li>
                       </ul>
                    </div>
                    <div class="tab-content">
                       <div class="tab-pane" id="details">
                          <div class="row">
                             <div class="col-sm-12">
                                <h4 class="info-text"> Let's start with the basic details.</h4>
                             </div>
                             <div class="col-md-12">
                                @if (!empty($errors->all()))
                                  <div class="alert alert-danger" role="alert">
                                    Please, check validity of all the input field of all stages.
                                  </div>
                                @endif
                             </div>
                             <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label"><strong>Date of Birth <span>**</span></strong></label>
                                 <input name="date_of_birth" type="date" class="form-control" value="{{old('date_of_birth')}}">
                                 @if ($errors->has('date_of_birth'))
                                   <p class="text-danger no-margin">{{$errors->first('date_of_birth')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label class="control-label"><strong>Mother Tongue <span>**</span></strong></label>
                                 <input name="mother_tongue" type="text" class="form-control" placeholder="Enter your mother tongue" value="{{old('mother_tongue')}}">
                                 @if ($errors->has('mother_tongue'))
                                   <p class="text-danger no-margin">{{$errors->first('mother_tongue')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label class="control-label"><strong>City <span>**</span></strong></label>
                                 <input name="city" type="text" value="{{old('city')}}" class="form-control" placeholder="Enter your city name">
                                 @if ($errors->has('city'))
                                   <p class="text-danger no-margin">{{$errors->first('city')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label style="margin-bottom: 15px;" class="control-label"><strong>Gender <span>**</span> </strong></label>
                                 <br>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="gender" value="male" {{(old('gender') == 'male') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio1">Male</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="gender" value="female" {{(old('gender') == 'female') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio3">Female</label>
                                 </div>
                                 @if ($errors->has('gender'))
                                   <p class="text-danger no-margin">{{$errors->first('gender')}}</p>
                                 @endif
                               </div>
                             </div>
                             <div class="col-sm-6">
                               <div class="form-group">
                                 <label class="control-label"><strong>Religion <span>**</span></strong></label>
                                 <select class="form-control" name="religion">
                                   <option value="" selected disabled>Select a religion</option>
                                   <option {{(old('religion') == 'Hindu') ? 'selected' : ''}} value="Hindu">Hindu</option>
                                   <option {{(old('religion') == 'Muslim') ? 'selected' : ''}} value="Muslim">Muslim</option>
                                   <option {{(old('religion') == 'Christian') ? 'selected' : ''}} value="Christian">Christian</option>
                                   <option {{(old('religion') == 'Shikh') ? 'selected' : ''}} value="Shikh">Shikh</option>
                                   <option {{(old('religion') == 'Parsi') ? 'selected' : ''}} value="Parsi">Parsi</option>
                                   <option {{(old('religion') == 'Jain') ? 'selected' : ''}} value="Jain">Jain</option>
                                   <option {{(old('religion') == 'Buddhist') ? 'selected' : ''}} value="Buddhist">Buddhist</option>
                                   <option {{(old('religion') == 'Jewish') ? 'selected' : ''}} value="Jewish">Jewish</option>
                                   <option {{(old('religion') == 'No Religion') ? 'selected' : ''}} value="No Religion">No Religion</option>
                                   <option {{(old('religion') == 'Spiritual') ? 'selected' : ''}} value="Spiritual">Spiritual</option>
                                   <option {{(old('religion') == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                                 </select>
                                 @if ($errors->has('religion'))
                                   <p class="text-danger no-margin">{{$errors->first('religion')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label class="control-label"><strong>Country <span>**</span></strong></label>
                                 <input name="country" value="{{old('country')}}" type="text" class="form-control" placeholder="Enter your country">
                                 @if ($errors->has('country'))
                                   <p class="text-danger no-margin">{{$errors->first('country')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label class="control-label"><strong>Marrital Status <span>**</span></strong></label>
                                 <select class="form-control" name="marrital_status">
                                   <option value="" selected disabled>Select a marrital status</option>
                                   <option {{(old('marrital_status') == 'nm') ? 'selected' : ''}} value="nm">Never Married</option>
                                   <option {{(old('marrital_status') == 'd') ? 'selected' : ''}} value="d">Divorced</option>
                                   <option {{(old('marrital_status') == 'w') ? 'selected' : ''}} value="w">Widowed</option>
                                   <option {{(old('marrital_status') == 'ad') ? 'selected' : ''}} value="ad">Awating Divorce</option>
                                   <option {{(old('marrital_status') == 'a') ? 'selected' : ''}} value="a">Annulled</option>
                                 </select>
                                 @if ($errors->has('marrital_status'))
                                   <p class="text-danger no-margin">{{$errors->first('marrital_status')}}</p>
                                 @endif
                               </div>
                             </div>
                          </div>
                       </div>
                       <div class="tab-pane" id="captain">
                         <div class="row">
                            <div class="col-sm-12">
                               <h4 class="info-text"> Just a few more steps! Please add your education & career details</h4>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label"><strong>Your Education Level <span>**</span></strong></label>
                                <select class="form-control" name="education_level">
                                  <option value="" selected disabled>Select a education level</option>
                                  <option {{(old('education_level') == 'doc') ? 'selected' : ''}} value="doc">Doctorate</option>
                                  <option {{(old('education_level') == 'ms') ? 'selected' : ''}} value="ms">Masters</option>
                                  <option {{(old('education_level') == 'hd') ? 'selected' : ''}} value="hd">Honours Degree</option>
                                  <option {{(old('education_level') == 'bach') ? 'selected' : ''}} value="bach">Bachelors</option>
                                  <option {{(old('education_level') == 'und') ? 'selected' : ''}} value="und">Undergraduate</option>
                                  <option {{(old('education_level') == 'ad') ? 'selected' : ''}} value="ad">Associates Degree</option>
                                  <option {{(old('education_level') == 'dip') ? 'selected' : ''}} value="dip">Diploma</option>
                                  <option {{(old('education_level') == 'hs') ? 'selected' : ''}} value="hs">High Scholl</option>
                                  <option {{(old('education_level') == 'lths') ? 'selected' : ''}} value="lths">Less than high school</option>
                                  <option {{(old('education_level') == 'ts') ? 'selected' : ''}} value="ts">Trade school</option>
                                </select>
                                @if ($errors->has('education_level'))
                                  <p class="text-danger no-margin">{{$errors->first('education_level')}}</p>
                                @endif
                              </div>
                              <div class="form-group">
                                <label class="control-label"><strong>Your work with <span>**</span> </strong></label>
                                <select class="form-control" name="work">
                                  <option value="" selected disabled>Select</option>
                                  <option {{(old('work') == 'prv') ? 'selected' : ''}} value="prv">Private Company</option>
                                  <option {{(old('work') == 'gp') ? 'selected' : ''}} value="gp">Government/Public Sector</option>
                                  <option {{(old('work') == 'dc') ? 'selected' : ''}} value="dc">Defence/Civil Services</option>
                                  <option {{(old('work') == 'bs') ? 'selected' : ''}} value="bs">Business/Self Employed</option>
                                  <option {{(old('work') == 'nw') ? 'selected' : ''}} value="nw">Not Working</option>
                                </select>
                                @if ($errors->has('work'))
                                  <p class="text-danger no-margin">{{$errors->first('work')}}</p>
                                @endif
                              </div>
                              <div class="form-group">
                                <label class="control-label"><strong>You annual income </strong></label>
                                <input class="form-control" type="text" name="income" value="{{old('income')}}" placeholder="Enter annual income">
                                @if ($errors->has('income'))
                                  <p class="text-danger no-margin">{{$errors->first('income')}}</p>
                                @endif
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label class="control-label"><strong>Your Education Field <span>**</span></strong></label>
                                <select class="form-control" name="education_field">
                                  <option value="" selected disabled>Select a education field</option>
                                  <option {{(old('education_field') == 'am') ? 'selected' : ''}} value="am">Advertising/Marketting</option>
                                  <option {{(old('education_field') == 'as') ? 'selected' : ''}} value="as">Administrative services</option>
                                  <option {{(old('education_field') == 'arch') ? 'selected' : ''}} value="arch">Architecture</option>
                                  <option {{(old('education_field') == 'af') ? 'selected' : ''}} value="af">Armed Forces</option>
                                  <option {{(old('education_field') == 'art') ? 'selected' : ''}} value="art">Arts</option>
                                  <option {{(old('education_field') == 'comm') ? 'selected' : ''}} value="comm">Commerce</option>
                                  <option {{(old('education_field') == 'comp') ? 'selected' : ''}} value="comp">Computer/IT</option>
                                  <option {{(old('education_field') == 'edu') ? 'selected' : ''}} value="edu">Education</option>
                                  <option {{(old('education_field') == 'eng') ? 'selected' : ''}} value="eng">Engineering/Technology</option>
                                  <option {{(old('education_field') == 'fash') ? 'selected' : ''}} value="fash">Fashion</option>
                                  <option {{(old('education_field') == 'fa') ? 'selected' : ''}} value="fa">Fine Arts</option>
                                  <option {{(old('education_field') == 'hs') ? 'selected' : ''}} value="hs">Home Science</option>
                                  <option {{(old('education_field') == 'law') ? 'selected' : ''}} value="law">Law</option>
                                  <option {{(old('education_field') == 'man') ? 'selected' : ''}} value="man">Management</option>
                                  <option {{(old('education_field') == 'nh') ? 'selected' : ''}} value="nh">Nursing/ Health Sciences</option>
                                  <option {{(old('education_field') == 'oa') ? 'selected' : ''}} value="oa">Office Administration</option>
                                  <option {{(old('education_field') == 'sci') ? 'selected' : ''}} value="sci">Science</option>
                                  <option {{(old('education_field') == 'ship') ? 'selected' : ''}} value="ship">Shipping</option>
                                  <option {{(old('education_field') == 'tt') ? 'selected' : ''}} value="tt">Travel & Tourism</option>
                                </select>
                                @if ($errors->has('education_field'))
                                  <p class="text-danger no-margin">{{$errors->first('education_field')}}</p>
                                @endif
                              </div>
                              <div class="form-group">
                                <label class="control-label"><strong>You work as </strong></label>
                                <input class="form-control" type="text" name="work_as" value="{{old('work_as')}}" placeholder="Enter your occupation">
                                @if ($errors->has('work_as'))
                                  <p class="text-danger no-margin">{{$errors->first('work_as')}}</p>
                                @endif
                              </div>
                            </div>
                         </div>
                       </div>
                       <div class="tab-pane" id="description">
                          <div class="row">
                            <div class="col-md-12">
                              <h4 class="info-text"> Add your lifestyle details and we are almost done</h4>
                            </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label class="control-label"><strong>What's your diet <span>**</span> </strong></label>
                                 <select class="form-control" name="diet">
                                   <option value="" selected disabled>Select</option>
                                   <option {{(old('diet') == 'veg') ? 'selected' : ''}} value="veg">Veg</option>
                                   <option {{(old('diet') == 'nv') ? 'selected' : ''}} value="nv">Non-Veg</option>
                                   <option {{(old('diet') == 'onv') ? 'selected' : ''}} value="onv">Occasionally Non-Veg</option>
                                   <option {{(old('diet') == 'egg') ? 'selected' : ''}} value="egg">Eggetarian</option>
                                   <option {{(old('diet') == 'jain') ? 'selected' : ''}} value="jain">Jain</option>
                                   <option {{(old('diet') == 'vegan') ? 'selected' : ''}} value="vegan">Vegan</option>
                                 </select>
                                 @if ($errors->has('diet'))
                                   <p class="text-danger no-margin">{{$errors->first('diet')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label style="margin-bottom: 15px;" class="control-label"><strong>Drink ? <span>**</span> </strong></label>
                                 <br>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="drink" value="no" {{(old('drink') == 'no') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio1">No</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="drink" value="occ" {{(old('drink') == 'occ') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio2">Occasionally</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="drink" value="yes" {{(old('drink') == 'yes') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio3">Yes</label>
                                 </div>
                                 @if ($errors->has('drink'))
                                   <p class="text-danger no-margin">{{$errors->first('drink')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label style="margin-bottom: 15px;" class="control-label"><strong>Body Type <span>**</span> </strong></label>
                                 <br>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="body_type" value="Slim" {{(old('body_type') == 'slim') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio1">Slim</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="body_type" value="ath" {{(old('body_type') == 'ath') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio2">Athletic</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="body_type"value="avg" {{(old('body_type') == 'avg') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio3">Average</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="body_type"value="Heavy" {{(old('body_type') == 'heavy') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio3">Heavy</label>
                                 </div>
                                 @if ($errors->has('body_type'))
                                   <p class="text-danger no-margin">{{$errors->first('body_type')}}</p>
                                 @endif
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label style="margin-bottom: 15px;" class="control-label"><strong>Do you smoke ? <span>**</span> </strong></label>
                                 <br>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="smoke" value="no" {{(old('smoke') == 'no') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio1">No</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="smoke" value="occ" {{(old('smoke') == 'occ') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio2">Occasionally</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="smoke"value="yes" {{(old('smoke') == 'yes') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio3">Yes</label>
                                 </div>
                                 @if ($errors->has('smoke'))
                                   <p class="text-danger no-margin">{{$errors->first('smoke')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label class="control-label"><strong>Your height <span>**</span> </strong></label>
                                 <input class="form-control" type="text" name="height" placeholder="Enter your height (eg. 5 ft 10 inch)" value={{old('height')}}>
                                 @if ($errors->has('height'))
                                   <p class="text-danger no-margin">{{$errors->first('height')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label style="margin-bottom: 15px;" class="control-label"><strong>Skin Tone <span>**</span> </strong></label>
                                 <br>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="skin_tone" value="vf" {{(old('skin_tone') == 'vf') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio1">Very fair</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="skin_tone" value="fair" {{(old('skin_tone') == 'fair') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio2">Fair</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="skin_tone"value="wh" {{(old('skin_tone') == 'wh') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio3">Wheatish</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="skin_tone"value="dark" {{(old('skin_tone') == 'dark') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio3">Dark</label>
                                 </div>
                                 @if ($errors->has('skin_tone'))
                                   <p class="text-danger no-margin">{{$errors->first('skin_tone')}}</p>
                                 @endif
                               </div>
                             </div>
                          </div>
                       </div>

                       <div class="tab-pane" id="describe">
                          <div class="row">
                            <div class="col-md-12">
                              <h4 class="info-text"> One last thing! Describe yourself in a few words</h4>
                            </div>
                             <div class="col-md-12">
                               <div class="form-group">
                                 <label class="control-label"><strong>About Yourself <span>**</span> </strong></label>
                                 <textarea name="about" class="form-control" rows="6" placeholder="Write something about yourself">{{old('about')}}</textarea>
                                 @if ($errors->has('about'))
                                   <p class="text-danger no-margin">{{$errors->first('about')}}</p>
                                 @endif
                               </div>
                               <div class="form-group">
                                 <label style="margin-bottom: 15px;" class="control-label"><strong>Any Disability ? <span>**</span> </strong></label>
                                 <br>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="disability" value="none" {{(old('disability') == 'none') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio1">None</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="disability" value="pd" {{(old('disability') == 'pd') ? 'checked' : ''}}>
                                   <label class="form-check-label" for="inlineRadio2">Physical disability</label>
                                 </div>
                                 @if ($errors->has('disability'))
                                   <p class="text-danger no-margin">{{$errors->first('disability')}}</p>
                                 @endif
                               </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="wizard-footer">
                       <div class="pull-right">
                          <input style="color:white;" type='button' class='btn btn-next btn-fill btn-danger btn-wd' value='Next' />
                          <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' value='Finish' />
                       </div>
                       <div class="clearfix"></div>
                    </div>
                 </form>
              </div>
           </div>
           <!-- wizard container -->
        </div>
     </div>
     <!-- row -->
  </div>
  <!--  big container -->
@endsection


@push('scripts')
<script src="{{asset('assets/user/js/compro.js')}}"></script>
@endpush
