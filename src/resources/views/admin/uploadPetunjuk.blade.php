@extends('layouts.admin')
@section('content')
<div class="relative overflow-x-auto h-full bgSecondITS shadow-md sm:rounded-lg">
<nav class="flex items-center justify-center flex-wrap p-5 fixed w-full z-10 top-0 sticky sm:justify-between">
    <div class="flex items-center flex-shrink-0 text-white  mr-6">
    <div>
        <span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Unggah Petunjuk</span>
    </div>
</div>
</nav>   

    <div id="upload" class="modal w-full h-96" data-state="0" data-ready="false">
	<div class="modal__header">
	</div>
	<div class="modal__body w-100">
		<div class="modal__col">
			<!-- up -->
			<svg class="modal__icon modal__icon--blue" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
				<g fill="none" stroke="hsl(223,90%,50%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
					<polyline class="modal__icon-sdo14" points="7 12 12 7 17 12" stroke-dasharray="14.2 14.2" />
					<line class="modal__icon-sdo10" x1="12" y1="7" x2="12" y2="17" stroke-dasharray="10 10" />
				</g>
			</svg>
			<!-- error -->
			<svg class="modal__icon modal__icon--red" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true" display="none">
				<g fill="none" stroke="hsl(3,90%,50%)" stroke-width="2" stroke-linecap="round">
					<circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
					<line class="modal__icon-sdo14" x1="7" y1="7" x2="17" y2="17" stroke-dasharray="14.2 14.2" />
					<line class="modal__icon-sdo14" x1="17" y1="7" x2="7" y2="17" stroke-dasharray="14.2 14.2" />
				</g>
			</svg>
			<!-- check -->
			<svg class="modal__icon modal__icon--green" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true" display="none">
				<g fill="none" stroke="hsl(138,90%,50%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
					<polyline class="modal__icon-sdo14" points="7 12.5 10 15.5 17 8.5" stroke-dasharray="14.2 14.2" />
				</g>
			</svg>
		</div>
		<div class="modal__col">
        @if($errors->any())
			<div class="modal__content" >
				<h2 class="modal__title">Oops!</h2>
				<p class="modal__message">File and tidak bisa di upload, silahkan periksa kembali file anda (.pdf)</p>
				<div class="modal__actions modal__actions--center">
                    <a href="{{route('uploadPetunjuk')}}">
					<button class="modal__button" type="button" >Kembali</button>
                </a>
				</div>
			</div>
        @endif
			<div class="modal__content">
                <form action="{{ route('uploadPDF') }}" method="POST" enctype="multipart/form-data">
                @csrf
				<h2 class="modal__title text-3xl">Unggah Petunjuk</h2>
				<p class="modal__message text-xl">Pilih file dari komputer anda</p>
				<div class="modal__actions pt-24">
					<button class="modal__button modal__button--upload text-lg" type="button" data-action="file">Pilih File</button>
					<input id="customFile" name="file" type="file" hidden>
				</div>
				<div class="modal__actions pt-24" hidden>
					<svg class="modal__file-icon" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
						<g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<polygon points="4 1 12 1 20 8 20 23 4 23" />
							<polyline points="12 1 12 8 20 8" />
						</g>
					</svg>
					<div class="modal__file" data-file></div>
					<button class="modal__close-button" type="button" data-action="fileReset">
						<svg class="modal__close-icon" viewBox="0 0 16 16" width="16px" height="16px" aria-hidden="true">
							<g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
								<polyline points="4,4 12,12" />
								<polyline points="12,4 4,12" />
							</g>
						</svg>
						<span class="modal__sr">Remove</span>
					</button>
					<button class="modal__button" data-action="upload">Upload</button>
				</div>
                </form>
			</div>
			<div class="modal__content" hidden>
				<h2 class="modal__title">Uploading…</h2>
				<p class="modal__message">Just give us a moment to process your file.</p>
				<div class="modal__actions">
					<div class="modal__progress">
						<div class="modal__progress-value" data-progress-value>0%</div>
						<div class="modal__progress-bar">
							<div class="modal__progress-fill" data-progress-fill></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
    window.addEventListener("DOMContentLoaded",() => {
	const upload = new UploadModal("#upload");
});

class UploadModal {
    filename = "";
    isUploading = false;
    progress = 0;
    progressTimeout = null;
    state = 0;

    constructor(el) {
        this.el = document.querySelector(el);
        this.el?.addEventListener("click",this.action.bind(this));
        this.el?.querySelector("#customFile")?.addEventListener("change",this.fileHandle.bind(this));
    }
    action(e) {
        this[e.target?.getAttribute("data-action")]?.();
        this.stateDisplay();
    }
    cancel() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 0;
        this.stateDisplay();
        this.progressDisplay();
        this.fileReset();
    }
    fail() {
        this.isUploading = false;
        this.progress = 0;
        this.progressTimeout = null;
        this.state = 2;
        this.stateDisplay();
    }
    file() {
        this.el?.querySelector("#customFile").click();
    }
    fileDisplay(name = "") {
        this.filename = name;

        const fileValue = this.el?.querySelector("[data-file]");
        if (fileValue) fileValue.textContent = this.filename;

        this.el?.setAttribute("data-ready", this.filename ? "true" : "false");
    }
    fileHandle(e) {
        return new Promise(() => {
            const { target } = e;
            if (target?.files.length) {
                let reader = new FileReader();
                reader.onload = e2 => {
                    this.fileDisplay(target.files[0].name);
                };
                reader.readAsDataURL(target.files[0]);
            }
        });
    }
    fileReset() {
        const fileField = this.el?.querySelector("#customFile");
        if (fileField) fileField.value = null;

        this.fileDisplay();
    }
    progressDisplay() {
        const progressValue = this.el?.querySelector("[data-progress-value]");
        const progressFill = this.el?.querySelector("[data-progress-fill]");
        const progressTimes100 = Math.floor(this.progress * 100);

        if (progressValue) progressValue.textContent = `${progressTimes100}%`;
        if (progressFill) progressFill.style.transform = `translateX(${progressTimes100}%)`;
    }
    async progressLoop() {
        this.progressDisplay();

        if (this.isUploading) {
            if (this.progress === 0) {
                await new Promise(res => setTimeout(res, 1000));
                if (!this.isUploading) {
                    return;
                } else if (Utils.randomInt(0,2) === 0) {
                    this.fail();
                    return;
                }
            }
            if (this.progress < 1) {
                this.progress += 0.01;
                this.progressTimeout = setTimeout(this.progressLoop.bind(this), 50);
            } else if (this.progress >= 1) {
                this.progressTimeout = setTimeout(() => {
                    if (this.isUploading) {
                        this.success();
                        this.stateDisplay();
                        this.progressTimeout = null;
                    }
                }, 250);
            }
        }
    }
    stateDisplay() {
        this.el?.setAttribute("data-state", `${this.state}`);
    }
    success() {
        this.isUploading = false;
        this.state = 3;
        this.stateDisplay();
    }
    upload() {
        if (!this.isUploading) {
            this.isUploading = true;
            this.progress = 0;
            this.state = 1;
            this.progressLoop();
        }
    }
}

class Utils {
    static randomInt(min = 0,max = 2**32) {
        const percent = crypto.getRandomValues(new Uint32Array(1))[0] / 2**32;
        const relativeValue = (max - min) * percent;

        return Math.round(min + relativeValue);
    }
}
</script>
        @endsection('content')