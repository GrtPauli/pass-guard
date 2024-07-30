@extends('layouts.main')

@section('children')
    <div class="pt-24 pb-10 relative flex size-full min-h-screen flex-col group/design-root overflow-x-hidden">
        <livewire:dashboard>
    </div>
@endsection

@section('script')
<script>
  window.addEventListener('close-modal', event => {
      $('#passwordModal').modal('hide');
      $('#updatePasswordModal').modal('hide');
      $('#deletePasswordModal').modal('hide');
    })

  window.addEventListener('copy-password', event => {
    const password = event.detail.password

    // Create a temporary textarea element to hold the text
    var tempTextArea = document.createElement('textarea');
    tempTextArea.value = password;
    document.body.appendChild(tempTextArea);

    // Select the text
    tempTextArea.select();
    tempTextArea.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text
    document.execCommand('copy');

    // Remove the temporary textarea
    document.body.removeChild(tempTextArea);
  })
</script>
@endsection

