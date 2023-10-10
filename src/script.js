const imageInput = document.getElementById("result");
const splitButton = document.getElementById("splitButton");
const downloadButton = document.getElementById("downloadButton");
const imageContainer = document.getElementById("imageContainer");
const dropZone = document.querySelector(".drop-zone");
const imgInputFeild = document.querySelector("#imgInp");
const uploadBtn = document.querySelector("#use");
const reUpLoadBtn = document.querySelector(".re-upload");
const croppieContainer = document.querySelector(".croppie-container");
const selectedImg = document.querySelector("#my-img");

let uploadedImage = null;
let splitImages = [];

function readURL(input) {
  if (input.files && input.files[0]) {
    imageContainer.innerHTML = "";
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#my-image").attr("src", e.target.result);
      var resize = new Croppie($("#my-image")[0], {
        viewport: {
          width: 452,
          height: 906,
        },
        boundary: {
          width: 450,
          height: 911,
        },
        enforceBoundary: false,

        // showZoomer: false,
        enableResize: true,
        enableOrientation: true,
      });
      $("#use").fadeIn();
      $("#use").on("click", function () {
        resize.result("base64").then(function (dataImg) {
          var data = [{ image: dataImg }, { name: "myimgage.jpg" }];
          $(imageInput).attr("src", dataImg);
        });
      });
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function () {
  readURL(this);
});

imgInputFeild.addEventListener("change", () => {
  imgInputFeild.classList.add("hidden");
  uploadBtn.classList.remove("hidden");
});

uploadBtn.addEventListener("click", () => {
  splitButton.classList.remove("hidden");
  document.querySelector(".croppie-container").style.opacity = "0";
});

splitButton.addEventListener("click", () => {
  downloadButton.classList.remove("hidden");
  reUpLoadBtn.classList.remove("hidden");
  uploadBtn.classList.add("hidden");
});

const mmToPixels = (mm) => {
  const dpi = 96; // Standard DPI for most screens
  return (mm * dpi) / 25.4; // 25.4mm = 1 inch
};

splitButton.addEventListener("click", () => {
  if (!imageInput) return;
  imageInput.classList.add("hidden");
  document.querySelector(".croppie-container").classList.add("hidden");

  const imgWidth = 1417;
  const imgHeight = 2834; // Original height of the input image

  const canvas = document.createElement("canvas");
  canvas.width = imgWidth;
  canvas.height = imgHeight;

  const ctx = canvas.getContext("2d");
  const img = new Image();
  img.src = imageInput.src;

  img.onload = function () {
    ctx.drawImage(img, 0, 0, imgWidth, imgHeight);

    const imageData = ctx.getImageData(0, 0, imgWidth, imgHeight).data;

    splitImages = [];

    // Calculate the height for the two equal parts
    const splitHeight = imgHeight / 2;

    for (let i = 0; i < 2; i++) {
      const startY = i * (imgHeight - splitHeight);

      const splitCanvas = document.createElement("canvas");
      splitCanvas.width = imgWidth;
      splitCanvas.height = splitHeight;

      const splitCtx = splitCanvas.getContext("2d");

      const data = splitCtx.createImageData(imgWidth, splitHeight);

      // Copy the image data from the original image
      for (let y = 0; y < splitHeight; y++) {
        const sourceOffset = (startY + y) * imgWidth * 4;
        const targetOffset = y * imgWidth * 4;

        data.data.set(
          imageData.subarray(sourceOffset, sourceOffset + imgWidth * 4),
          targetOffset
        );
      }

      splitCtx.putImageData(data, 0, 0);

      const splitImg = new Image();
      splitImg.src = splitCanvas.toDataURL();
      splitImg.className = "splitImage";
      splitImages.push(splitImg);
    }

    // Assuming you have an element with id "imageContainer" in your HTML
    const imageContainer = document.getElementById("imageContainer");
    imageContainer.innerHTML = "";
    splitImages.forEach((splitImg) => imageContainer.appendChild(splitImg));

    // Enable the download button
    const downloadButton = document.getElementById("downloadButton");
    downloadButton.disabled = false;
  };
});

// Download button click event handler
downloadButton.addEventListener("click", () => {
  if (!splitImages || splitImages.length !== 2) return;

  // Loop through the splitImages array
  for (let index = 0; index < splitImages.length; index++) {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    // Set the canvas size to the image dimensions
    canvas.width = 1417;
    canvas.height = 1417;

    // Fill the canvas with white background
    context.fillStyle = "#fff"; // Set to white color
    context.fillRect(0, 0, canvas.width, canvas.height);

    // Draw the image onto the canvas
    context.drawImage(
      splitImages[index],
      0,
      0,
      splitImages[index].width,
      splitImages[index].height
    );

    // Convert canvas content to a data URL
    const dataUrl = canvas.toDataURL("image/jpeg"); // You can change the format if needed

    // Create a temporary link for download
    const downloadLink = document.createElement("a");
    downloadLink.href = dataUrl;
    downloadLink.download = `template_${index + 1}.jpg`; // Specify the desired filename

    // Programmatically trigger the download
    downloadLink.click();
  }
});
