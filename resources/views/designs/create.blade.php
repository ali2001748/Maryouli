<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Shirt Design</title>
    {{-- Basic styling - can be replaced/enhanced with Tailwind later --}}
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        textarea { width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 4px; border: 1px solid #ddd; box-sizing: border-box; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #0056b3; }
        .preview-area { margin-top: 20px; padding: 10px; border: 1px dashed #ddd; }
        .preview-area h3 { margin-top: 0; }
        .img-placeholder { width: 200px; height: 250px; background-color: #eee; display: flex; align-items: center; justify-content: center; text-align: center; border: 1px solid #ccc; margin: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generate Your Shirt Design</h1>

        <form id="designForm" action="{{ route('design.generate') }}" method="POST">
            @csrf
            <div>
                <label for="prompt">Enter your design prompt:</label>
                <textarea name="prompt" id="prompt" rows="3" required>{{ old('prompt') }}</textarea>
            </div>
            <button type="submit">Generate Design</button>
        </form>

        <div class="preview-area" id="previewArea" style="display:none;">
            <h3>Preview</h3>
            <p><strong>Prompt:</strong> <span id="previewPrompt"></span></p>
            <div>
                <strong>Front:</strong>
                <div class="img-placeholder" id="previewImageFront">Front Preview</div>
            </div>
            <div>
                <strong>Back:</strong>
                <div class="img-placeholder" id="previewImageBack">Back Preview</div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('designForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const form = event.target;
            const formData = new FormData(form);
            const prompt = formData.get('prompt');

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('previewPrompt').textContent = data.prompt;
                // For now, we're just showing text. Later, we'll update src of img tags
                document.getElementById('previewImageFront').textContent = 'Front: ' + data.front_image;
                document.getElementById('previewImageBack').textContent = 'Back: ' + data.back_image;
                document.getElementById('previewArea').style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while generating the design.');
            });
        });
    </script>
</body>
</html>
