from fastapi import FastAPI
from enum import Enum
from pydantic import BaseModel
from typing import Any
from ultralytics import YOLO
import uvicorn

app = FastAPI()

@app.get("/")
async def root():
    return {"message": "YOLOv8 Human Detection for Tower 2 ITS"}

@app.get("/predict/")
async def root(model: str, file: str) -> Any:
    models = YOLO(model+".pt")
    filepath = "../src/storage/app/public/images/"+file
    results = models(filepath, classes=0)
    data = results[0].boxes.data.cpu().tolist()
    person = len(data)
    jsonData = {'person': person}
    return jsonData

if __name__ == "__main__":
    uvicorn.run(app, host="127.0.0.1", port=8080)