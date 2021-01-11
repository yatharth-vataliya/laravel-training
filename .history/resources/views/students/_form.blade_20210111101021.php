@csrf
<div class="row my-4">
    <div class="col-md-3">
        <label for="student_name">Student Name</label>
        <input type="text" class="form-control @error('student_name') @enderror" id="student_name" value="{{ (!empty($student) ? $student->student_name : (!empty(old('student_name')) ? old('student_name') : '')) }}" name="student_name" placeholder="Student Name">
        @error('student_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="student_email">Student Email</label>
        <input type="email" class="form-control" id="student_email" value="{{ (!empty($student) ? $student->student_email : (!empty(old('student_email')) ? old('student_email') : '')) }}" name="student_email" placeholder="Student Email">
    </div>
    <div class="col-md-3">
        <label for="student_birth_date">Date of Birth</label>
        <input type="date" class="form-control" id="student_birth_date" value="{{ (!empty($student) ? $student->student_birth_date : (!empty(old('student_birth_date')) ? old('student_birth_date') : '')) }}" name="student_birth_date">
    </div>
    <div class="col-md-3">
        <label for="student_mobile">Student Mobile</label>
        <input type="text" class="form-control" id="student_mobile" value="{{ (!empty($student) ? $student->student_mobile : (!empty(old('student_mobile')) ? old('student_mobile') : '')) }}" name="student_mobile" placeholder="Student Mobile">
    </div>
</div>
<div class="row my-4">
    <div class="col-md-3">
        <fieldset>
            <legend class="legend">Gender</legend>
            <label for="female">Female</label>
            <input type="radio" name="student_gender" value="female" id="female" {{ ((!empty($student) ? $student->student_gender : (!empty(old('student_gender')) ? old('student_gender') : '')) == 'female' ? 'checked' : '') }}>
            <label for="male">Male</label>
            <input type="radio" name="student_gender" value="male" id="male" {{ ((!empty($student) ? $student->student_gender : (!empty(old('student_gender')) ? old('student_gender') : '')) == 'male' ? 'checked' : '') }}>
        </fieldset>
    </div>
    <div class="col-md-3">
        <fieldset>
            @php
            $hobbies = (!empty($student) ? $student->student_hobbies : (!empty(old('student_hobbies')) ? old('student_hobbies') : ''));
            if(!empty($hobbies) && $hobbies != ''){
            if(!is_array($hobbies)){
            $hobbies = explode(',',$hobbies);
            }
            }else{
            $hobbies = [];
            }
            @endphp
            <legend class="legend">Hobbies</legend>
            <label for="cycling">Cycling</label>
            <input type="checkbox" id="cycling" value="cycling" class="custom-checkbox" name="student_hobbies[]" {{ (in_array('cycling',$hobbies) ? 'checked' : '') }}>
            <label for="Travelling">Travelling</label>
            <input type="checkbox" id="travelling" value="travelling" class="custom-checkbox" name="student_hobbies[]" {{ (in_array('travelling',$hobbies) ? 'checked' : '') }}>
            <br />
            <label for="mount_climbing">Mount Climbing</label>
            <input type="checkbox" id="mount_climbing" value="mount_climbing" class="custom-checkbox" name="student_hobbies[]" {{ (in_array('mount_climbing',$hobbies) ? 'checked' : '') }}>
            <label for="swimming">Swimming</label>
            <input type="checkbox" id="swimming" value="swimming" class="custom-checkbox" name="student_hobbies[]" {{ (in_array('swimming',$hobbies) ? 'checked' : '') }}>
        </fieldset>
    </div>
    <div class="col-md-3">
        <label for="student_stream">Select Stream</label>
        <select name="student_stream" id="student_stream" class="custom-select">
            <option value="" selected="false" disabled="true">-- select student stream --</option>
            <option value="B.Sc.IT" {{ ((!empty($student) ? $student->student_stream : (!empty(old('student_stream')) ? old('student_stream') : '')) == 'B.Sc.IT' ? 'selected' : '') }}>
                B.Sc.IT
            </option>
            <option value="M.Sc.IT" {{ ((!empty($student) ? $student->student_stream : (!empty(old('student_stream')) ? old('student_stream') : '')) == 'M.Sc.IT' ? 'selected' : '') }}>
                M.Sc.IT
            </option>
            <option value="BCA" {{ ((!empty($student) ? $student->student_stream : (!empty(old('student_stream')) ? old('student_stream') : '')) == 'BCA' ? 'selected' : '') }}>
                BCA
            </option>
            <option value="MCA" {{ ((!empty($student) ? $student->student_stream : (!empty(old('student_stream')) ? old('student_stream') : '')) == 'MCA' ? 'selected' : '') }}>
                MCA
            </option>
            <option value="B.Voc.AC.TECH" {{ ((!empty($student) ? $student->student_stream : (!empty(old('student_stream')) ? old('student_stream') : '')) == 'B.Voc.AC.TECH' ? 'selected' : '') }}>
                B.Voc.AC.TECH
            </option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="student_profile_picture">Select Profile Picture</label>
        <input type="file" id="student_profile_picture" name="student_profile_picture" class="form-control">
    </div>
</div>
<div class="row py-4">
    <div class="col-md-3">
        <label for="student_address">Student Address</label>
        <textarea name="student_address" id="student_address" cols="30" rows="5" class="form-control" placeholder="Student Address">{{ (!empty($student) ? $student->student_address : (!empty(old('student_address')) ? old('student_address') : '')) }}</textarea>
    </div>
    <div class="col-md-3">
        @if(!empty($student) && !empty($student->getRawOriginal('student_profile_picture')))
        <button class="btn btn-danger" id="delete_image" type="button"><i class="fas fa-trash"></i></button>
        @endif
        <img src="{{ (!empty($student) ? $student->student_profile_picture : '') }}" style="height: 200px; width: 200px;" id="preview_image" alt="Preview Profile Picture">
    </div>
</div>
<div class="row py-4">
    <div class="col-md-3">
        <input type="submit" value="{{ (!empty($student) ? 'Update Student' : 'Add student') }}" class="btn {{ (!empty($student) ? 'btn-info' : 'btn-success') }} btn-block">
    </div>
</div>