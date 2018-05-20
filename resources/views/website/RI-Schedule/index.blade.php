@extends('website.partials.app')
@section('title','Routine Immunization')
@section('extra_style')
@endsection
@section('content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">{{ $page }}</h2>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <section class="section-padding">
        <div class="container">
            <div class="row showcase-section">
                <div class="col-md-6">
                    <img src="{{ asset('web/img/works/9.jpg')}}" alt="showcase image">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <h3>Lorem Ipsum Dolor sit</h3>
                        <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Vivamus
                            suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
                        <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo..</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">

        <div class="about">

            
            <div class="row">                
                <div class="block-heading-two">
                    <h3><span>Routine Immunization Vaccines</span></h3>
                </div>
                <div class="col-md-6">
                    <!-- Accordion starts -->
                    <div class="panel-group" id="accordion-alt3">
                        <!-- Panel. Use "panel-XXX" class for different colors. Replace "XXX" with color. -->
                        <div class="panel">
                            <!-- Panel heading -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseOne-alt3">
                                        <i class="fa fa-angle-right"></i> BCG VACCINE
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne-alt3" class="panel-collapse collapse">
                                <!-- Panel body -->
                                <div class="panel-body">
                                    BCG is an antibacterial vaccine that protects against severe forms of  tuberculosis  in  infants  and  young  children.  Tuberculosis (TB) is a disease caused by the bacterium Mycobacterium tuberculosis. It usually attacks the lungs, but can also affect other parts of the body, including the bones, joints and brain. <br/>
                                    The letters, B, C and G stand for Bacillus of Calmette and Guerin. Bacillus describes the rod shape of the tuberculosis bacteria; Calmette and Guerin are the names of the people who developed the vaccine.
                                    <table class="display nowrap table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr style="background-color:#00AD5E;color:#fefefe;">
                                                <th>Category</th>
                                                <th>Description </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name of vaccine</td>
                                                <td>BCG</td>
                                            </tr>
                                            <tr>
                                                <td>Number of doses</td>
                                                <td>One</td>
                                            </tr>
                                            <tr>
                                                <td>Schedule</td>
                                                <td>
                                                    At birth, or as soon as possible after birth. If  not  given  at  birth,  it  is better to give within the ﬁrst three months, when the infant is at greatest  risk of developing the most severe forms of TB, such as TB meningitis. Immunization is generally ineffective at older ages.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Booster (additional dose)</td>
                                                <td>None</td>
                                            </tr>
                                            <tr>
                                                <td>Contraindications (a medical reason for not giving the vaccine either temporarily or permanently)</td>
                                                <td>
                                                    Babies or infants showing symptoms of HIV infection
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Adverse events</td>
                                                <td>Mild normal reaction (swelling, small sore). Rarely, severe reaction,
                                                e.g. local abscess, or swelling of glands (lymph nodes) 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseTwo-alt3">
                                        <i class="fa fa-angle-right"></i> PENTAVALENT VACCINE
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo-alt3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    The pentavalent vaccine combines  ﬁve  different vaccines in one injection to protect against four bacterial diseases: diphtheria (a  serious  bacterial  infection  causing  a sore throat, high fever and serious complications which can be fatal), tetanus (a disease that is acquired through exposure  to  the  spores  of  these  bacteria, which are universally present in the soil), pertussis (also known as whooping cough, a highly contagious, acute respiratory infection caused by the bacteria Bordetella pertussis), and Haemophilus inﬂuenzae type b(a bacterium which causes pneumonia and meningitis in children, often  abbreviated  to Hib); and one viral disease caused by hepatitis B virus. The vaccines include Diphtheria toxoid, Pertussis vaccine, Tetanus toxoid (TT) , Haemophilus influenza type b ((Hib) and Hepatitis B vaccine.
                                    <table class="display nowrap table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr style="background-color:#00AD5E;color:#fefefe;">
                                                <th>Category</th>
                                                <th>Description </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name of vaccine</td>
                                                <td>
                                                    Pentavalent Vaccine (Five different antigens combined
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Number of doses</td>
                                                <td>Three (referred to as Penta1, Penta2 and Penta3)</td>
                                            </tr>
                                            <tr>
                                                <td>Schedule</td>
                                                <td>
                                                    At 6, 10 and 14 weeks of age
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Booster (additional dose)</td>
                                                <td>
                                                    None in males; boosters of tetanus toxoid vaccine are given to women of childbearing age
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Contraindications (a medical reason for not giving the vaccine either temporarily or permanently)</td>
                                                <td>
                                                    Severe allergic reaction or encephalopathy to a previous pentavalent immunization
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Adverse events</td>
                                                <td>
                                                    Mild local reactions are common. Rarely, injection-site abscess
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Special precautions</td>
                                                <td>
                                                    Usually not given after six years of age because of the increased risk of serious adverse reactions
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseThree-alt3">
                                        <i class="fa fa-angle-right"></i> PNEUMOCOCCAL VACCINE (PCV10)
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree-alt3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Pneumococcal vaccines (PCVs) protect against pneumonia and other pneumococcal infections caused by Streptococcus pneumoniae bacteria. These bacteria can attack different parts of  the  body,  causing  serious  infections  in the lungs (pneumonia), the inner ear (acute otitis media), the bloodstream (bacteraemia), and the membranes covering the brain and spinal cord (meningitis).<br/>
                                     The WHO estimates that up to one million children die of pneumococcal infections every year, mainly in sub-Saharan Africa and South East Asia.
                                    <table class="display nowrap table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr style="background-color:#00AD5E;color:#fefefe;">
                                                <th>Category</th>
                                                <th>Description </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name of vaccine</td>
                                                <td>Pneumococcal vaccines</td>
                                            </tr>
                                            <tr>
                                                <td>Number of doses</td>
                                                <td>Three (Referred to as PCV1, PCV2 and PCV3)</td>
                                            </tr>
                                            <tr>
                                                <td>Schedule</td>
                                                <td>
                                                    At 6, 10 and 14 weeks of age.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Booster (additional dose)</td>
                                                <td>None</td>
                                            </tr>
                                            <tr>
                                                <td>Contraindications (a medical reason for not giving the vaccine either temporarily or permanently)</td>
                                                <td>
                                                    An infant with a high-grade fever, or who developed a severe vaccine reaction after a previous dose
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Adverse events</td>
                                                <td>
                                                    Mild local reactions (redness, pain and slight swelling at the injection site) and/or mild fever and irritability of the child may occur, but these reactions usually disappear within 24 hours.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseEight-alt3">
                                        <i class="fa fa-angle-right"></i> HEPATITIS B VACCINE (HBV)
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseEight-alt3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Hepatitis B vaccine is a vaccine that prevents hepatitis B. Hepatitis B is a serious disease that affects the liver.  It is caused by the hepatitis B virus.  Hepatitis B can cause mild illness (fever, fatigue, jaundice, pain in muscles, joints and stomach, etc) lasting a few weeks, or it can lead to a serious, lifelong illness (liver cancer, liver cirrhosis) and death.If a child is infected with hepatitis B viruses, liver disease may develop many years later in adult life.<br/>
                                    The first dose is recommended within 24 hours of birth Additional three more doses are recommended to be given after that. HBV is one of the vaccines in the pentavalent vaccine, and hence these additional doses are received in the pentavalent vaccine doses.

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion ends -->

                </div>

                <div class="col-md-6">                    
                    <!-- Accordion starts -->
                    <div class="panel-group" id="accordion-alt3">
                        <!-- Panel. Use "panel-XXX" class for different colors. Replace "XXX" with color. -->
                        <div class="panel">
                            <!-- Panel heading -->
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseFive-alt3">
                                        <i class="fa fa-angle-right"></i> ORAL POLIO VACCINE (OPV)
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive-alt3" class="panel-collapse collapse">
                                <!-- Panel body -->
                                <div class="panel-body">
                                    OPV gives  protection against the three types of  polioviruses (types 1, 2 and 3) that cause poliomyelitis (polio) – a crippling disease of the brain and spinal cord.<br/>
                                    Poliomyelitis is also called acute ﬂaccid paralysis (AFP) or polio, and is the sudden onset of severe weakening or loss of muscle tone in the legs, arms or hands.

                                    <table class="display nowrap table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr style="background-color:#00AD5E;color:#fefefe;">
                                                <th>Category</th>
                                                <th>Description </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name of vaccine</td>
                                                <td>Oral Polio Vaccine</td>
                                            </tr>
                                            <tr>
                                                <td>Number of doses</td>
                                                <td>
                                                    Four (referred to as OPV0, OPV1, OPV2 and
                                                    OPV3),  plus  campaign doses
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Schedule</td>
                                                <td>
                                                    At birth, 6, 10 and 14 weeks
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Booster (additional dose)</td>
                                                <td>
                                                    If the child spits or vomits after OPV, repeat the
                                                    dose immediately; if the child has diarrhoea, give a ﬁfth dose at least 4 weeks after the scheduled fourth dose

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Contraindications (a medical reason for not giving the vaccine either temporarily or permanently)</td>
                                                <td>
                                                    None
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Adverse events</td>
                                                <td>
                                                    Very rarely AFP; refer immediately to a health
                                                    centre 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Special precautions</td>
                                                <td>None</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseSix-alt3">
                                        <i class="fa fa-angle-right"></i>MEASLES VACCINE
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSix-alt3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Measles vaccine provides protection against measles, a highly infectious disease caused by a virus that weakens the immune system, leaving children susceptible to other dangerous childhood infections. The common signs and symptoms of measles are a red skin rash, runny nose and conjunctivitis.
                                    <table class="display nowrap table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr style="background-color:#00AD5E;color:#fefefe;">
                                                <th>Category</th>
                                                <th>Description </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name of vaccine</td>
                                                <td>Measles</td>
                                            </tr>
                                            <tr>
                                                <td>Number of doses</td>
                                                <td>One</td>
                                            </tr>
                                            <tr>
                                                <td>Schedule</td>
                                                <td>
                                                    At 9 months.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Booster (additional dose)</td>
                                                <td>
                                                    To achieve high-level population immunity, a second dose is ideally given after 12 months  of age during supplementary immunization activities
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Contraindications (a medical reason for not giving the vaccine either temporarily or permanently)</td>
                                                <td>
                                                    Severe allergic reaction to previous dose
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Adverse events</td>
                                                <td>
                                                    Fever, rash and (rarely) severe allergic reaction or abscess
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Special precautions</td>
                                                <td>None</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion-alt3" href="#collapseSeven-alt3">
                                        <i class="fa fa-angle-right"></i> ROTAVIRUS VACCINE
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSeven-alt3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Rotavirus vaccine is a new vaccine added to the national immunization schedule and provides protection against Rotavirus. Rotaviruses are the leading cause of severe diarrhoeal disease and dehydration among children in many developed and developing countries.
                                    <h5>
                                    Rotavirus vaccine is given in two oral doses, each at the following time intervals:</h5>
                                    <ul>
                                        <li>First dose at 6 weeks of age, but no later than 12 weeks</li>
                                        <li>Second dose at least 4 weeks after the ﬁrst dose</li>
                                        <li>The two-dose schedule should be completed by 16 weeks, but no later than by 24 weeks of age.</li>
                                    </ul>
                                    Note that the ideal schedule is to give the  ﬁrst dose of Rotavirus vaccine to all infants at 6 weeks of age at the same time as giving Penta1 and OPV1, and  give the second dose at 10 weeks at the same time as Penta2 and OPV2.

                                </div>
                            </div>
                        </div>                        
                    </div>
                    <!-- Accordion ends -->

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading and para -->
                    <div class="block-heading-two">
                        <h3><span>Get Your Child Immunization Schedule</span></h3>
                    </div>
                    <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                        ipsam voluptatem quia voluptas sit aspernatur. <br/><br/>Sed ut perspiciaatis iste natus error sit voluptatem probably haven't heard of them accusamus.</p>
                </div>
                <div class="col-md-6">
                    <div class="form-body">
                        <h3 class="card-title m-t-15">Child Info</h3>
                        <hr>
                        <div id="errors"></div>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Full Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="John doe">
                            	</div>
                        	</div>
                        	<div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">email</label>
                                    <input type="email" id="email" class="form-control" placeholder="John_doe@hotmail.com">
                            	</div>
                        	</div>
                        </div>
                        <!--/row-->
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">Gender</label>
                                    <select class="form-control custom-select" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <small class="form-control-feedback"> Select your gender </small> </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Date of Birth</label>
                                    <input type="date" id="dob" class="form-control" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="form-actions">
	                            <button id="get_routine" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
	                        </div>
                            <!--/span-->
                        </div>
                	</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" >      
                    <h4 class="immunization_header"></h4>              
                    <div class="table-responsive m-t-40" id="routine-immunization">
                    <table id="example23-" class="display nowrap table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr style="background-color:#00AD5E;color:#fefefe;">
                                <th>Chidl's Age </th>
                                <th>Vaccine </th>
                                <th>Disease It Protects Against</th>
                                <th>Vacination Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr style="background-color:#00AD5E;color:#fefefe;">
                                <th>Chidl's Age </th>
                                <th>Vaccine </th>
                                <th>Disease It Protects Against</th>
                                <th>Vacination Date</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection
@section('javascript')	
	<script type="text/javascript">
		var TOKEN = "{{csrf_token()}}";
		var SCHEDULE = "{{URL::route('schedule.store')}}";
	</script>
	<script src="{{ asset('web/js/pages/schedule.js')}}"></script>
	
@endsection