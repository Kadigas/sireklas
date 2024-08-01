import requests
import cv2

base_url = "http://127.0.0.1:8080"
endpoint = "/predict"
url_no_params = base_url + endpoint
model_name = "yolov8n"
url_with_params = url_no_params + "?model=" + model_name

def request(url, image_file, verbose=True):
    full_url = url_with_params + "&file=" + image_file
    response = requests.get(full_url)
    status_code = response.status_code
    if verbose:
        if status_code == 200:
            msg = "Success OK"
        else:
            msg = "Internal server error"
        print(msg)
    return response

camera = cv2.VideoCapture(0)
img_counter = 0

while True:
    ret, frame = camera.read()

    if not ret:
        print("failed to grab frame")
        break
    cv2.imshow("test", frame)

    k = cv2.waitKey(1)
    if k%256 == 27:
        # ESC pressed
        print("Escape hit, closing...")
        break
    elif k%256 == 32:
        img_path = "../src/public/storage/images/{}.png".format(img_counter)
        cv2.imwrite(img_path, frame)
        response = request(url_with_params, img_path, verbose=True)
        print(response.text)
        img_counter += 1 

camera.release()
