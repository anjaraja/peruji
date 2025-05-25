@extends('dashboard.app')

@section('title', 'PERUJI')

@section('content')

@include('dashboard.sidebar')
<div class="loading-container">
    <div class="spinner-grow text-warning mx-2" role="status">
    </div>
    <div class="spinner-grow text-warning mx-2" role="status">
    </div>
    <div class="spinner-grow text-warning mx-2" role="status">
    </div>
</div>
<div class="content-container upcoming-events show">
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            UPCOMING EVENTS
        </div>
    </div>
    <div class="accordion" id="eventAccordion">
        <!-- Event 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    Event #1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <form source="event1">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="event_name" class="form-control" placeholder="Title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="text" name="event_date" class="form-control" placeholder="Event date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="event_message" rows="3" placeholder="Describe the event in one paragraph" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo/Image Banner</label>
                            <input type="file" name="event_banner" class="form-control" accept="image/png, image/jpeg, image/gif">
                            <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Event Agenda</label>
                            <input type="file" name="event_agenda" class="form-control" accept="application/pdf">
                        </div>
                        <button type="submit" class="submit-btn">UPLOAD</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Event 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    Event #2
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <form source="event2">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="event_name" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="text" name="event_date" class="form-control" placeholder="Event date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="event_message" rows="3" placeholder="Describe the event in one paragraph"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo/Image Banner</label>
                            <input type="file" name="event_banner" class="form-control" accept="image/png, image/jpeg, image/gif">
                            <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Event Agenda</label>
                            <input type="file" name="event_agenda" class="form-control" accept="application/pdf">
                        </div>
                        <button type="submit" class="submit-btn">UPLOAD</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Event 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    Event #3
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <form source="event3">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="event_name" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="text" name="event_date" class="form-control" placeholder="Event date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="event_message" rows="3" placeholder="Describe the event in one paragraph"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo/Image Banner</label>
                            <input type="file" name="event_banner" class="form-control" accept="image/png, image/jpeg, image/gif">
                            <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Event Agenda</label>
                            <input type="file" name="event_agenda" class="form-control" accept="application/pdf">
                        </div>
                        <button type="submit" class="submit-btn">UPLOAD</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Event 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                    Event #4
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <form source="event4">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="event_name" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="text" name="event_date" class="form-control" placeholder="Event date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="event_message" rows="3" placeholder="Describe the event in one paragraph"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo/Image Banner</label>
                            <input type="file" name="event_banner" class="form-control" accept="image/png, image/jpeg, image/gif">
                            <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Event Agenda</label>
                            <input type="file" name="event_agenda" class="form-control" accept="application/pdf">
                        </div>
                        <button type="submit" class="submit-btn">UPLOAD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-container previous-events">

    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            PREVIOUS EVENTS
        </div>
    </div>

      <div class="row">
        <!-- Left: Form -->
        <div class="col-md-7">
          <form>
            <div class="mb-3">
              <label class="form-label">Event Title</label>
              <input type="text" class="form-control" placeholder="Title">
            </div>
            <div class="mb-3">
              <label class="form-label">Date</label>
              <input type="text" class="form-control" placeholder="Event date">
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="3" placeholder="Describe the event in one paragraph"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Photo/Image</label>
              <input type="file" class="form-control" accept="image/png, image/jpeg">
              <small class="form-text text-muted">Photo size 756x491 pixels (jpg/png)</small>
            </div>
            <div class="mb-3">
              <label class="form-label">News Links</label>
              <input type="text" class="form-control" placeholder="Provide link/s if available">
            </div>
            <button type="submit" class="submit-btn">UPLOAD</button>
          </form>
        </div>

        <!-- Right: List of Previous Events -->
        <div class="col-md-5">
          <h5 class="text-warning fw-bold mb-3">Edit Previous Events</h5>
          <div class="bg-light p-3 rounded shadow-sm">
            <ul class="list-unstyled">
              <li><a href="#">Effective Testing, Monitoring Techniques for Cardiac</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2024</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2023</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2022</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2019</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2018</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2017</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2016</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2015</a></li>
              <li><a href="#">Indonesia Underwriting Summit 2014</a></li>
            </ul>
          </div>
        </div>
      </div>
</div>
<div class="content-container newsroom">

    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            NEWS ROOM
        </div>
    </div>
    <div class="row">
      <!-- Left: News Form -->
      <div class="col-md-7">
        <form>
          <div class="mb-3">
            <label class="form-label">News Title</label>
            <input type="text" class="form-control" placeholder="Title">
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="text" class="form-control" placeholder="News date">
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="3" placeholder="One paragraph news"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Photo/Image</label>
            <input type="file" class="form-control" accept="image/png, image/jpeg">
            <small class="form-text text-muted">Photo size 756x491 pixels (jpg/png)</small>
          </div>
          <div class="mb-3">
            <label class="form-label">News Links</label>
            <input type="text" class="form-control" placeholder="Provide link/s if available">
          </div>
          <button type="submit" class="submit-btn">UPLOAD</button>
        </form>
      </div>

      <!-- Right: News List -->
      <div class="col-md-5">
        <h5 class="text-warning fw-bold mb-3">Edit News</h5>
        <div class="bg-light p-3 rounded shadow-sm">
          <ul class="list-unstyled">
            <li><a href="#">Effective Testing, Monitoring Techniques for Cardiac</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2024</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2023</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2022</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2019</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2018</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2017</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2016</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2015</a></li>
            <li><a href="#">Indonesia Underwriting Summit 2014</a></li>
          </ul>
        </div>
      </div>
    </div>
</div>
<div class="content-container admin-emails-index">

    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            ADMIN EMAILS
        </div>
    </div>

    <form class="w-50">
      <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Email #1</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" placeholder="Email address">
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Email #2</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" placeholder="Email address">
        </div>
      </div>
      <div class="mb-4 row">
        <label class="col-sm-3 col-form-label">Email #3</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" placeholder="Email address">
        </div>
      </div>

      <button type="submit" class="submit-btn">CONFIRM</button>
    </form>
</div>
<script>
    // fetchData(
    //     this_route,
    //     "POST",
    //     {"Authorization":localStorage.getItem("Token")},
    //     formdata
    // )
    // .then((response)=>{
    //     if (response.status !== 200){
    //         showAlert("not-ok","created")
    //         return response.json();
    //     }
    //     showAlert("ok","created")
    //     return response.json();
    // })
    // .then((data)=>{
    //     alert("OK")
    // });
</script>
<script>
    upcoming_form = document.querySelectorAll(".content-container.upcoming-events form");

    upcoming_form.forEach(this_form => {
        this_form.addEventListener('submit', function(event) {
            event.preventDefault();

            formdata = new FormData();

            event_source = this.getAttribute("source")
            formdata.append("eventsource",event_source)
            event_name = this.querySelector("input[name='event_name']").value
            formdata.append("eventname",event_name)
            event_date = this.querySelector("input[name='event_date']").value
            formdata.append("eventdate",event_date)
            event_message = this.querySelector("textarea[name='event_message']").value
            formdata.append("description",event_message)
            event_banner = this.querySelector("input[name='event_banner']").files[0]
            formdata.append("banner",event_banner)
            event_agenda = this.querySelector("input[name='event_agenda']").files[0]
            formdata.append("agenda",event_agenda)

            if(this.querySelector("input[name='events']")){
                this_route = "{{route('update-events')}}";
            }
            else{
                this_route = "{{route('create-events')}}";
            }

            fetchData(
                this_route,
                "POST",
                {"Authorization":localStorage.getItem("Token")},
                formdata
            )
            .then((response)=>{
                if (response.status !== 200){
                    showAlert("not-ok","created")
                    return response.json();
                }
                showAlert("ok","created")
                return response.json();
            })
            .then((data)=>{
                alert("OK")
            });

            return false;
        })
    })
</script>
@endsection