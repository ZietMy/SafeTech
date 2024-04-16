async function uploadImg() {
    const cloud_name = "dek0d5mli";
    const upload_preset = "tqimq8ur";
  
    let url = '';
  
    const formData = new FormData();
    formData.append("img", file.target.files[0]);
    formData.append("upload_preset", upload_preset);
    const options = {
      method: "POST",
      body: formData,
    };
  
  if (file) {
      await fetch(
        `https://api.cloudinary.com/v1_1/${cloud_name}/image/upload`,
        options
      )
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          url = data.secure_url
        })
        .catch((err) => console.log(err));
      return url
    }
  
    return;
  
  }