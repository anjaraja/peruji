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
            <input type="text" class="form-control" placeholder="Title" name="newstitle" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" placeholder="News date" name="newsdate" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message (IDN)</label>
            <textarea class="form-control" rows="3" placeholder="One paragraph news" name="newsmessage" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Message (ENG)</label>
            <textarea class="form-control" rows="3" placeholder="One paragraph news" name="eng_newsmessage" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Photo/Image</label>
            <input type="file" class="form-control" accept="image/png, image/jpeg" name="newsimage" required>
            <small class="form-text text-muted">Photo size 756x491 pixels (jpg/png)</small>
          </div>
          <div class="mb-3">
            <label class="form-label">News Links</label>
            <textarea type="text" class="form-control" placeholder="Provide links if available" name="newslinks"></textarea>
          </div>
          <button type="submit" class="submit-btn">UPLOAD</button>
          <button type="reset" class="cancel-form-btn btn btn-danger">CANCEL</button>
        </form>
      </div>

      <!-- Right: News List -->
      <div class="col-md-5">
        <h5 class="text-warning fw-bold mb-3">Edit News</h5>
        <div class="bg-light p-3 rounded shadow-sm">
          <ul class="list-unstyled list-of-news">
          </ul>
        </div>
      </div>
    </div>
</div>

<script get-news>
    container_list_news = document.querySelector(".list-of-news");
    const getNewsData = function(){
        responseData = {}
        fetchData(
            "{{route('list-news',1)}}",
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
            sessionStorage.setItem("list-news",JSON.stringify(row_data));

            container_list_news.replaceChildren();
            for(key in row_data){
                news_data = row_data[key];
                container_list_news.insertAdjacentHTML("beforeend",`
                    <li class="text-black row-news" onclick="showToFormNews(this)" style="cursor:pointer;" id="${news_data['id']}">${news_data['newsname']}</li>
                `)
            }
        });
    }
    document.addEventListener("DOMContentLoaded",function(){
        if(document.querySelector(".content-container.newsroom")){
            getNewsData();
        }
    })
</script>
<script submit-news>
    news_form = document.querySelector(".content-container.newsroom form");

    const showToFormNews = function(this_element){
        loading("show")
        this_element.closest("ul").querySelectorAll("li").forEach((el)=>{
            el.classList.remove("active");
        })
        this_element.classList.add("active")
        selected_news = this_element.getAttribute("id");
        list_news_data = JSON.parse(sessionStorage.getItem("list-news"))

        for(key in list_news_data){
            if(list_news_data[key]["id"] == selected_news){
                form_data = list_news_data[key];
                news_form.querySelector("input[name='news']")?.remove();
                news_form.insertAdjacentHTML("afterbegin",`<input name="news" value="${form_data["id"]}" style="display:none;">`)
                news_form.querySelector("input[name='newstitle']").value = form_data["newsname"];
                news_form.querySelector("input[name='newsdate']").value = form_data["newsdate"];
                news_form.querySelector("textarea[name='newsmessage']").value = form_data["description"];
                news_form.querySelector("textarea[name='eng_newsmessage']").value = form_data["eng_description"];
                news_form.querySelector("textarea[name='newslinks']").value = form_data["additionalcontent"];
                if(form_data["photo"]){
                    input_photo = news_form.querySelector("input[name='newsimage']");
                    input_photo.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
                    input_photo.style.display = 'none';
                    input_photo.closest("div.mb-3").insertAdjacentHTML("beforeend",`
                        <div preview-file>
                            <div class="form-control" style="border:none;">
                                <img src="${form_data['photo']}" style="max-width:400px">
                            </div>
                            <span>Thumbnail image ${form_data["newsname"]}</span>
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
                    input_photo = news_form.querySelector("input[name='newsimage']");
                    input_photo.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
                    input_photo.style.display = 'block';
                }
            }
        }

        loading("close",500)
    }

    news_form.addEventListener("reset",function(event){
        document.querySelectorAll("ul.list-unstyled li.row-news").forEach((el)=>{
            el.classList.remove("active");
        })
        input_thumbnail = news_form.querySelector("input[name='newsimage']");
        input_thumbnail.closest("div.mb-3").querySelector("div[preview-file]")?.remove();
        this.querySelector("input[name='news']")?.remove();
        input_thumbnail.style.display = 'block';
        // this.querySelector("button.cancel-form-btn").classList.remove("show");
    })

    news_form.addEventListener('submit', function(event) {
        loading("show")
        event.preventDefault();

        formdata = new FormData();

        news_title = this.querySelector("input[name='newstitle']").value
        formdata.append("newsname",news_title)
        news_date = this.querySelector("input[name='newsdate']").value
        formdata.append("newsdate",news_date)
        news_message = this.querySelector("textarea[name='newsmessage']").value
        formdata.append("description",news_message)
        eng_news_message = this.querySelector("textarea[name='eng_newsmessage']").value
        formdata.append("eng_description",eng_news_message)
        news_links = this.querySelector("textarea[name='newslinks']").value
        formdata.append("additionalcontent",news_links)

        news_image = this.querySelector("input[name='newsimage']").files[0]
        if(!news_image){
            input_news_image = this.querySelector("input[name='newsimage']");
            exist_news_image = input_news_image.closest("div[class*='col-md']").querySelector("div[preview-file]");

            if(!exist_news_image){
                formdata.append("delete_photo",true);
            }
        }
        else{
            formdata.append("photo",news_image);
        }

        specific_data = this.querySelector("input[name='news']");
        if(specific_data){
            this_route = "{{route('update-news')}}";
            formdata.append("news",specific_data.value)
        }
        else{
            this_route = "{{route('create-news')}}";
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
            getNewsData();
        });
        this.reset();
        return false;
    })
</script>