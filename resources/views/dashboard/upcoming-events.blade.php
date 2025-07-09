<div class="content-container upcoming-events">
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            UPCOMING EVENTS
        </div>
    </div>
    <div class="accordion" id="eventAccordion">
        <!-- Event 1 -->
        @for($i=1;$i<=4;$i++)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$i}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}">
                        Event #{{$i}}
                    </button>
                </h2>
                <div id="collapse{{$i}}" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <form class="row" source="event{{$i}}">
                            <div class="col-md-12 p-0">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="event_name" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="date" name="event_date" class="form-control" placeholder="Event date" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Event Duration (Days)</label>
                                        <input type="text" name="event_duration" class="form-control" placeholder="Event date" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Display Date</label>
                                        <input type="date" name="event_display_date" class="form-control" placeholder="Event display date" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label class="form-label">Description (IND)</label>
                                        <textarea class="form-control" name="event_message" rows="3" placeholder="Describe the event in one paragraph" required></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Description (ENG)</label>
                                        <textarea class="form-control" name="eng_event_message" rows="3" placeholder="Describe the event in one paragraph" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Photo/Image Banner</label>
                                    <input type="file" name="event_banner" class="form-control" accept="image/png, image/jpeg, image/gif">
                                    <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Event Agenda</label>
                                    <input type="file" name="event_agenda" class="form-control" accept="application/pdf">
                                </div>
                            </div>
                            <button type="submit" class="submit-btn">UPLOAD</button>
                        </form>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
<script get-upcoming-events>
    const getUpcomingEvent = function(){
        responseData = {};
        fetchData(
            "{{route('list-events',1)}}",
            "GET",
            {"Authorization":localStorage.getItem("Token")}
        )
        .then((response)=>{
            if (response.status !== 200){
                showAlert("not-ok","get")
                return response.json();
            }
            return response.json();
        })
        .then((data)=>{
            responseData = data;
        })
        .finally(() =>{
            row_data = responseData["data"]["data"];
            for(key in row_data){
                form_data = row_data[key];
                source_form = document.querySelector(`form[source='${form_data["source"]}']`);
                source_form.insertAdjacentHTML("afterbegin",`<input name="events" value="${form_data["id"]}" style="display:none;">`)
                source_form.querySelector("input[name='event_name']").value = form_data["eventname"];
                source_form.querySelector("input[name='event_date']").value = form_data["eventdate"];
                source_form.querySelector("input[name='event_duration']").value = form_data["duration"];
                source_form.querySelector("input[name='event_display_date']").value = form_data["publishdate"];
                source_form.querySelector("textarea[name='event_message']").value = form_data["description"];
                source_form.querySelector("textarea[name='eng_event_message']").value = form_data["eng_description"];
                if(form_data["banner"]){
                    input_banner = source_form.querySelector("input[name='event_banner']");
                    input_banner.style.display = 'none';
                    input_banner.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
                    input_banner.closest("div.mb-3").insertAdjacentHTML("beforeend",`
                        <div preview-file>
                            <div class="form-control" style="border:none;">
                                <img src="${form_data['banner']}" style="max-width:400px">
                            </div>
                            <span>Banner image ${form_data["eventname"]}</span>
                            <span class="btn btn-danger" for="delete-preview-file">
                                <i class="bi text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </i> Delete
                            </span>
                        </div>
                    `)
                }
                if(form_data["agenda"]){
                    input_agenda = source_form.querySelector("input[name='event_agenda']");
                    input_agenda.style.display = 'none'
                    input_agenda.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
                    input_agenda.closest("div.mb-3").insertAdjacentHTML("beforeend",`
                        <div preview-file>
                            <a href="${form_data["agenda"]}" class="form-control" style="border:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                                </svg>
                            </a>
                            <span>${form_data["eventname"]}.pdf</span>
                            <span class="btn btn-danger" for="delete-preview-file">
                                <i class="bi text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </i> Delete
                            </span>
                        </div>
                    `)
                }
            }
        });
    }
    getUpcomingEvent();
</script>
<script submit-upcoming-events>
    upcoming_form = document.querySelectorAll(".content-container.upcoming-events form");

    upcoming_form.forEach(this_form => {
        this_form.addEventListener('submit', function(event) {
            loading("show")
            event.preventDefault();

            formdata = new FormData();

            thisform = this;

            event_name = thisform.querySelector("input[name='event_name']").value
            formdata.append("eventname",event_name)
            event_date = thisform.querySelector("input[name='event_date']").value
            formdata.append("eventdate",event_date)
            event_duration = thisform.querySelector("input[name='event_duration']").value
            formdata.append("duration",event_duration)
            event_display_date = thisform.querySelector("input[name='event_display_date']").value
            formdata.append("eventdisplaydate",event_display_date)
            event_message = thisform.querySelector("textarea[name='event_message']").value
            formdata.append("description",event_message)
            eng_event_message = thisform.querySelector("textarea[name='eng_event_message']").value
            formdata.append("eng_description",eng_event_message)
            event_banner = thisform.querySelector("input[name='event_banner']").files[0];
            if(!event_banner){
                input_banner = source_form.querySelector("input[name='event_banner']");
                exist_banner = input_banner.closest("div.mb-3").querySelector("div[preview-file]");

                if(!exist_banner){
                    formdata.append("delete_banner",true);
                }
            }
            else{
                formdata.append("banner",event_banner);
            }
            event_agenda = thisform.querySelector("input[name='event_agenda']").files[0]
            if(!event_agenda){
                input_agenda = source_form.querySelector("input[name='event_agenda']");
                exist_agenda = input_agenda.closest("div.mb-3").querySelector("div[preview-file]");

                if(!exist_agenda){
                    formdata.append("delete_agenda",true);
                }
            }
            else{
                formdata.append("agenda",event_agenda);
            }

            specific_data = thisform.querySelector("input[name='events']");
            if(specific_data){
                this_route = "{{route('update-events')}}";
                formdata.append("events",specific_data.value)
            }
            else{
                this_route = "{{route('create-events')}}";
                event_source = thisform.getAttribute("source")
                formdata.append("eventsource",event_source)
            }

            fetchData(
                this_route,
                "POST",
                {"Authorization":localStorage.getItem("Token")},
                formdata
            )
            .then((response)=>{
                if (response.status !== 200){
                    if(!specific_data) showAlert("not-ok","created")
                    else showAlert("not-ok","updated")

                    return response.json();
                }
                
                showAlert("ok","updated")
                return response.json();
            })
            .then((data)=>{
                loading("close",500)
            })
            .finally(() => {
                thisform.querySelector("input[name='event_banner']").value = ""
                thisform.querySelector("input[name='event_agenda']").value = ""
                getUpcomingEvent();
            });

            this

            return false;
        })
    })

    delete_preview_button = document.addEventListener("click",function(e){
        this_element = e.target;
        if(this_element.matches("span[for='delete-preview-file']")){
            if(this_element.closest("div.mb-3")) this_element.closest("div.mb-3").querySelector("input").style.display = "block";
            else if(this_element.closest("div[class*='col-md']")) this_element.closest("div[class*='col-md']").querySelector("input").style.display = "block";
            this_element.closest("div[preview-file]").remove();
        }
    });
</script>