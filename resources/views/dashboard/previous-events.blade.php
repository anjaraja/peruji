<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered gallery-modal">
        <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Upload Gallery</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div id="dropZone" class="drop-zone">
                Drag & Drop images here or click to select
                <input type="file" id="fileInput" accept="image/*" multiple hidden>
              </div>

              <div id="previewContainer" class="gallery-preview"></div>
            </div>

            <div class="modal-footer">
              <!-- <button id="uploadBtn" class="btn btn-success">Upload</button> -->
              <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <form class="row" source="update_event">
                <div class="col-md-12 p-0">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="update_event_name" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="update_event_date" class="form-control" placeholder="Event date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Event Duration (Days)</label>
                            <input type="text" name="update_event_duration" class="form-control" placeholder="Event date" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Description (IND)</label>
                            <textarea class="form-control" name="update_event_message" rows="3" placeholder="Describe the event in one paragraph" required></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Description (ENG)</label>
                            <textarea class="form-control" name="update_eng_event_message" rows="3" placeholder="Describe the event in one paragraph" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Photo/Image Banner</label>
                        <input type="file" name="update_event_banner" class="form-control" accept="image/png, image/jpeg, image/gif">
                        <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Thumbnail</label>
                        <input type="file" name="update_event_thumbnail" class="form-control" accept="image/png, image/jpeg, image/gif">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Gallery</label>
                        <span class="btn btn-primary gallery-btn">Upload photo to gallery</span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Event Agenda</label>
                        <input type="file" name="update_event_agenda" class="form-control" accept="application/pdf">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Additional Links</label>
                        <textarea class="form-control" name="update_event_links" rows="3" placeholder="list all of links"></textarea>
                    </div>
                </div>
                <div class="d-flex flex-row px-0 action-button justify-content-between">
                    <button type="submit" class="submit-btn">UPLOAD</button>
                </div>
            </form>
        </div>

        <!-- Right: List of Previous Events -->
        <div class="col-md-5">
          <h5 class="text-warning fw-bold mb-3">Edit Previous Events</h5>
          <div class="bg-light p-3 rounded shadow-sm">
            <ul class="list-unstyled list-of-previous-event">
            </ul>
          </div>
        </div>
      </div>
</div>

<script get-previous-events>
    const getPreviousEvent = function(){
        responseData = {}
        fetchData(
            "{{route('list-previous-events',1)}}",
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
        .finally(()=>{
            row_data = responseData["data"]["data"];
            sessionStorage.setItem("list-previous",JSON.stringify(row_data));

            container_list_previous_event = document.querySelector(".list-of-previous-event");
            container_list_previous_event.replaceChildren();
            for(key in row_data){
                previous_event = row_data[key];
                container_list_previous_event.insertAdjacentHTML("afterbegin",`
                    <li class="text-black row-previous-event" onclick="showToFormNews(this)" style="cursor:pointer;" id="${previous_event['id']}">${previous_event['eventname']}</li>
                `)
            }
        });
    }
    getPreviousEvent();
</script>
<script submit-previous-events>
    // previous_event_list = document.querySelectorAll(".row-previous-event");
    const showToFormPrevious = function(this_element){
        loading("show")
        prev_event_id = this_element.getAttribute("id");
        list_previous_data = JSON.parse(sessionStorage.getItem("list-previous"))

        source_form = document.querySelector(`form[source='update_event']`);
        source_form.querySelector("span[type='publish']")?.remove();

        for(key in list_previous_data){
            if(list_previous_data[key]["id"] == prev_event_id){
                form_data = list_previous_data[key];
                if(!form_data["isprevious"]){
                    source_form.querySelector(".action-button").insertAdjacentHTML("beforeend",`<span type="publish" class="submit-btn" style="cursor:pointer;">PUBLISH</span>`);
                }
                source_form.insertAdjacentHTML("afterbegin",`<input name="update_events" value="${form_data["id"]}" style="display:none;">`)
                source_form.querySelector("input[name='update_event_name']").value = form_data["eventname"];
                source_form.querySelector("input[name='update_event_date']").value = form_data["eventdate"];
                source_form.querySelector("input[name='update_event_duration']").value = form_data["duration"];
                source_form.querySelector("textarea[name='update_event_message']").value = form_data["description"];
                source_form.querySelector("textarea[name='update_eng_event_message']").value = form_data["eng_description"];
                source_form.querySelector("textarea[name='update_event_links']").value = form_data["additionalcontent"];
                if(form_data["banner"]){
                    input_banner = source_form.querySelector("input[name='update_event_banner']");
                    input_banner.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
                    input_banner.style.display = 'none';
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
                if(form_data["thumbnail"]){
                    input_thumbnail = source_form.querySelector("input[name='update_event_thumbnail']");
                    input_thumbnail.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
                    input_thumbnail.style.display = 'none';
                    input_thumbnail.closest("div.mb-3").insertAdjacentHTML("beforeend",`
                        <div preview-file>
                            <div class="form-control" style="border:none;">
                                <img src="${form_data['thumbnail']}" style="max-width:400px">
                            </div>
                            <span>Thumbnail image ${form_data["eventname"]}</span>
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
                else{
                    input_thumbnail = source_form.querySelector("input[name='update_event_thumbnail']");
                    input_thumbnail.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
                    input_thumbnail.style.display = 'block';
                }
                if(form_data["agenda"]){
                    input_agenda = source_form.querySelector("input[name='update_event_agenda']");
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
        }

        loading("close",500)
    }
    const publishPrevious = function(this_element){
        loading("show");
        responseData = {};

        formdata = new FormData();
        events = this_element.closest("form").querySelector("input[name='update_events']").value;
        formdata.append("events",events);

        fetchData(
            "{{route('publish-previous-events')}}",
            "POST",
            {},
            formdata
        )
        .then((response)=>{
            if (response.status !== 200){
                showAlert("not-ok","updated")
                return response.json();
            }

            showAlert("ok","updated")
            return response.json();
        })
        .then((data)=>{
            responseData = data;
        })
        .finally(()=>{
            loading("close",500)
            getPreviousEvent()
            setTimeout(function(){
                document.querySelector(`.row-previous-event[id='${events}']`).click()
            },500)
        })
    }
    document.addEventListener("click",function(event){
        this_element = event.target;

        if(this_element.matches(".row-previous-event")){
            showToFormPrevious(this_element);
        }
        else if(this_element.matches("span[type='publish']")){
            publishPrevious(this_element)
        }
    })

    
    this_form = document.querySelector("form[source='update_event']");

    this_form.addEventListener('submit', function(event) {
        loading("show");
        event.preventDefault();

        formdata = new FormData();

        event_name = this.querySelector("input[name='update_event_name']").value
        formdata.append("eventname",event_name)
        event_date = this.querySelector("input[name='update_event_date']").value
        formdata.append("eventdate",event_date)
        event_duration = this.querySelector("input[name='update_event_duration']").value
        formdata.append("duration",event_duration)
        // event_display_date = this.querySelector("input[name='update_event_display_date']").value
        // formdata.append("eventdisplaydate",event_display_date)
        event_message = this.querySelector("textarea[name='update_event_message']").value
        formdata.append("description",event_message)
        eng_event_message = this.querySelector("textarea[name='update_eng_event_message']").value
        formdata.append("eng_description",eng_event_message)
        event_thumbnail = this.querySelector("input[name='update_event_thumbnail']").files[0]
        if(event_thumbnail) formdata.append("thumbnail",event_thumbnail)
        event_banner = this.querySelector("input[name='update_event_banner']").files[0]
        if(event_banner) formdata.append("banner",event_banner)
        event_agenda = this.querySelector("input[name='update_event_agenda']").files[0]
        if(event_agenda) formdata.append("agenda",event_agenda)
        event_additional_links = this.querySelector("textarea[name='update_event_links']").value
        formdata.append("additionalcontent",event_additional_links)

        specific_data = this.querySelector("input[name='update_events']");

        this_route = "{{route('update-events')}}";
        formdata.append("events",specific_data.value)

        fetchData(
            this_route,
            "POST",
            {"Authorization":localStorage.getItem("Token")},
            formdata
        )
        .then((response)=>{
            if (response.status !== 200){
                showAlert("not-ok","updated")

                return response.json();
            }

            showAlert("ok","updated")
            return response.json();
        })
        .then((data)=>{
            loading("close",500);
        })
        .finally(() =>{
            getPreviousEvent();
            setTimeout(function(){
                document.querySelector(`.row-previous-event[id='${specific_data.value}']`).click()
            },500)
        });

        return false;
    })
</script>
<script gallery-upload>
    source_form = document.querySelector(`form[source='update_event']`);
    source_form.querySelector(".gallery-btn").addEventListener("click",function(e){
        selected_event = source_form.querySelector("input[name='update_events']");
        if(!selected_event){
            return false;
        }
        else{
            galleryModalElement = document.getElementById('galleryModal');
            galleryModal = new bootstrap.Modal(galleryModalElement);

            previous_event = JSON.parse(sessionStorage.getItem("list-previous"))
            galleryModalElement.querySelector(".modal-body #previewContainer").innerHTML = "";
            for (value of previous_event){
                if(value["id"] == selected_event.value){
                    gallery_photo = JSON.parse(value["photo"]);
                    for(key2 in gallery_photo){
                        value2 = gallery_photo[key2]
                        galleryModalElement.querySelector(".modal-body #previewContainer").insertAdjacentHTML("beforeend",`<div class="gallery-item"><img src="${value2}" path="${value2}"><button class="remove-btn">x</button></div>`)
                    }
                }
            }

            galleryModal.show();
        }
        // alert(selected_event.value);
    })
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('previewContainer');
    const uploadBtn = document.getElementById('uploadBtn');

    let selectedFiles = [];

    dropZone.addEventListener('click', () => fileInput.click());

    dropZone.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', () => {
      dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', (e) => {
      e.preventDefault();
      dropZone.classList.remove('dragover');
      handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', (e) => {
      handleFiles(e.target.files);
    });

    function handleFiles(files) {
      for (const file of files) {
        if (!file.type.startsWith('image/')) continue;

        formdata = new FormData;
        formdata.append("events",source_form.querySelector("input[name='update_events']").value);
        formdata.append("photo",file);

        image_name = "";
        responseData = {};
        fetchData(
            "{{route('upload-gallery-events')}}",
            "POST",
            {"Authorization":localStorage.getItem("Token")},
            formdata
        )
        .then((response)=>{
            if (response.status !== 200){
                showAlert("not-ok","updated")
                return response.json();
            }
            return response.json();
        })
        .then((data)=>{
            responseData = data;
        })
        .finally(() =>{
            const index = selectedFiles.push(file) - 1;

            const reader = new FileReader();
            reader.onload = (e) => {
                total_item = document.querySelectorAll(".modal-body .gallery-item").length;
              const wrapper = document.createElement('div');
              wrapper.className = 'gallery-item';

              const img = document.createElement('img');
              img.src = e.target.result;
              img.setAttribute("path",responseData["data"]);

              const removeBtn = document.createElement('button');
              removeBtn.innerHTML = '×';
              removeBtn.className = 'remove-btn';
              // removeBtn.onclick = () => {
              //   selectedFiles[index] = null; // Mark for deletion
              //   previewContainer.removeChild(wrapper);
              // };

              wrapper.appendChild(img);
              wrapper.appendChild(removeBtn);
              previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });        
      }
    }

    document.addEventListener("click",function(e){
        if(e.target.matches("button.remove-btn")){
            btn_parent = e.target.closest("div.gallery-item");

            formdata = new FormData;
            formdata.append("events",source_form.querySelector("input[name='update_events']").value);
            formdata.append("photo",btn_parent.querySelector("img").getAttribute("path"));

            responseData = {};
            fetchData(
                "{{route('delete-gallery-events')}}",
                "POST",
                {"Authorization":localStorage.getItem("Token")},
                formdata
            )
            .then((response)=>{
                if (response.status !== 200){
                    showAlert("not-ok","updated")
                    return response.json();
                }
                return response.json();
            })
            .then((data)=>{
                responseData = data;
            })
            .finally(() =>{
                e.target.closest("div.gallery-item").remove();
                getPreviousEvent()
            });  
        }
    })

    // uploadBtn.addEventListener('click', () => {
    //   const filteredFiles = selectedFiles.filter(f => f); // remove deleted
    //   if (filteredFiles.length === 0) {
    //     alert('No images selected!');
    //     return;
    //   }

    //   console.log('Uploading files:', filteredFiles);
    //   alert(`${filteredFiles.length} image(s) uploaded!`);

    //   // Reset all
    //   selectedFiles = [];
    //   previewContainer.innerHTML = '';
    //   fileInput.value = '';
    // });
</script>