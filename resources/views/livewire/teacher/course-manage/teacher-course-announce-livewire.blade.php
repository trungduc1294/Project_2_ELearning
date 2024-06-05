<div class="my-6">
    <h1 class="text-2xl font-semibold">Cập nhật thông báo lớp học</h1>
    <div class="input_area mt-4">
        <textarea 
            name="announce" id="announce" cols="30" rows="10"
            class="w-full p-2 outline-none bg-gray-700 rounded-md text-white mb-2"
            wire:model="announcement"
        ></textarea>
        <button 
            class="bg-blue-500 text-white p-2 rounded-md"
            wire:click="updateCourseAnnouncement">Cập nhật</button>
    </div>
</div>
