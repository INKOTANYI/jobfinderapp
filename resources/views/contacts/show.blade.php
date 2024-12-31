@if ($contact)
    <p>Name: {{ $contact->name }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Subject: {{ $contact->subject }}</p>
    <p>Message: {{ $contact->message }}</p>

    @if ($fileExists)
        <!-- Provide a link to download the file -->
        <a href="{{ asset('uploads/' . $contact->file_path) }}" class="btn btn-primary" download>Download Attachment</a>
    @else
        <p>No attachment available.</p>
    @endif
@else
    <p>Contact message not found.</p>
@endif
