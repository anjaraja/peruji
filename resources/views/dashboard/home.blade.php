@extends('dashboard.app')

@section('title', 'PERUJI')

@section('content')
<style type="text/css">
    .content-container{
        padding-top: 10vh !important;
    }
    .form-label {
      font-weight: 500;
    }
    .upload-btn {
      background-color: #f7941d;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 30px;
      border-radius: 20px;
    }
</style>
<div class="col py-4 content-container">
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            UPCOMING EVENTS
        </div>
    </div>
    <div class="row">
        <!-- Event #1 -->
          <div class="col-md-6">
            <form>
              <div class="mb-3">
                <label class="form-label">Event #1</label>
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
                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Event Agenda</label>
                <input type="file" class="form-control" accept=".pdf">
              </div>
              <button type="submit" class="upload-btn">UPLOAD</button>
            </form>
          </div>

          <!-- Event #2 -->
          <div class="col-md-6">
            <form>
              <div class="mb-3">
                <label class="form-label">Event #2</label>
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
                <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                <small class="form-text text-muted">Banner size 720x150 pixels (jpg/png/gif)</small>
              </div>
              <div class="mb-3">
                <label class="form-label">Event Agenda</label>
                <input type="file" class="form-control" accept=".pdf">
              </div>
              <button type="submit" class="upload-btn">UPLOAD</button>
            </form>
        </div>
    </div>
</div>
@endsection