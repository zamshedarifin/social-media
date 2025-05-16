@extends('layouts.front')
@section('title','Home')
@section('content')
    <main class="2xl:ml-[--w-side] xl:ml-[--w-side-md] md:ml-[--w-side-small]">
        <div id="app">
            @verbatim
    <div class="main__inner">


        <div class="flex max-lg:flex-col xl:gap-10 md:gap-3 md:mt-10" id="js-oversized">

            <!-- feed story -->
            <div class="md:max-w-[510px] mx-auto flex-1 xl:space-y-6 space-y-3">
                <!-- Upload & Actions Section -->
                <div class="max-w-xl mx-auto p-6 bg-[#242526] text-white rounded-lg shadow-lg space-y-6 text-black">
                    <!-- Caption -->
                    <div class="space-y-2">
                        <label for="caption" class="block text-lg text-black font-semibold">Caption</label>

                        <!-- Tagged user summary -->
                             <span v-if="taggedUsers.length > 0" class="text-black">
                              is with
                              <template v-for="(taguser, index) in taggedUsers" :key="taguser.id">
                                <span class="text-black font-medium">
                                  {{ taguser.name }}
                                  <span v-if="index < taggedUsers.length - 2">, </span>
                                  <span v-else-if="index === taggedUsers.length - 2"> and </span>
                                </span>
                              </template>
                            </span>

                        <textarea
                            v-model="caption"
                            id="caption"
                            placeholder="What's on your mind?"
                            class="w-full p-3 bg-[#3A3B3C] border border-gray-700 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                        ></textarea>
                    </div>

                    <!-- Buttons like Facebook -->
                    <div class="grid grid-cols-3 sm:grid-cols-3 gap-3 text-black">
                        <!-- Photo/Video -->  <label  v-if="auth == 1 || auth == 2 || auth == 3"
                            :class="['flex items-center space-x-3 bg-[#3A3B3C] hover:bg-[#4E4F50] p-3 rounded-lg cursor-pointer transition-all', photoPreviews.length ? 'ring-2 ring-blue-500' : '']"
                        >
                            <i class="fas fa-photo-video text-xs" style="color: #45BD62;"></i> &nbsp;
                            <span class="text-sm">Photo</span>
                            <input
                                type="file"
                                ref="photo"
                                accept="image/*"
                                multiple
                                @change="handleFileChange('photo')"
                                class="hidden"
                            />
                        </label>
                        <!-- Tag People -->
                        <div class="relative">
                            <button
                                @click="showTagDropdown = !showTagDropdown"
                                class="flex items-center w-full space-x-3 bg-[#3A3B3C] hover:bg-[#4E4F50] p-3 rounded-lg cursor-pointer transition-all"
                            >
                                <i class="fas fa-user-tag text-xs text-blue-400"></i>
                                <span class="text-sm">Tag people</span>
                            </button>
                            <!-- Dropdown -->

                        </div>

                        <label  v-if="auth == 3"
                            :class="['flex items-center space-x-3 bg-[#3A3B3C] hover:bg-[#4E4F50] p-3 rounded-lg cursor-pointer transition-all', isVideoSelected ? 'ring-2 ring-red-500' : '']"
                        >
                            <i class="fas fa-video text-xs" style="color: #F02849;"></i> &nbsp;
                            <span class="text-sm">Video</span>
                            <input
                                type="file"
                                ref="video"
                                accept="video/*"
                                @change="handleFileChange('video')"
                                class="hidden"
                            />
                        </label>
                        <!-- Reel -->
                        <label v-if="auth == 1 || auth == 2 || auth == 3"
                            :class="['flex items-center space-x-3 bg-[#3A3B3C] hover:bg-[#4E4F50] p-3 rounded-lg cursor-pointer transition-all', isReelSelected ? 'ring-2 ring-pink-400' : '']"
                        >
                            <i class="fas fa-film text-xs" style="color: #FF69B4;"></i> &nbsp;
                            <span class="text-sm">Reel</span>
                            <input
                                type="file"
                                ref="reel"
                                accept="video/*"
                                @change="handleFileChange('reel')"
                                class="hidden"
                            />
                        </label>
                    </div>
                    <div
                        v-if="showTagDropdown"
                        class="mt-2 p-3 bg-[#3A3B3C] border border-gray-700 rounded-lg max-h-60 overflow-y-auto"
                    >
                        <label for="taggedUsers" class="block text-sm mb-1">Select Users</label>
                        <select
                            id="taggedUsers"
                            v-model="taggedUsers"
                            multiple
                            class="w-full bg-[#242526] border border-gray-600 rounded p-2 text-white"
                        >
                            <option
                                v-for="user in followList"
                                :key="user.id"
                                :value="user"
                                class="text-black"
                            >
                                {{ user.name }}
                            </option>
                        </select>
                        <p class="text-xs text-gray-400 mt-1">Hold Ctrl/Cmd to select multiple</p>
                    </div>

                    <!-- Multiple Photo Previews -->
                    <div v-if="photoPreviews.length" class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-4">
                        <div
                            v-for="(src, index) in photoPreviews"
                            :key="index"
                            class="w-full h-32 overflow-hidden rounded-lg shadow-md border border-gray-600 relative"
                        >
                            <img :src="src" alt="Preview" class="w-full h-full object-cover" />
                            <button
                                @click="removePhoto(index)"
                                class="absolute top-1 right-1 bg-black bg-opacity-50 text-white rounded-full w-6 h-6 flex items-center justify-center cursor-pointer"
                                title="Remove photo"
                            >
                                &times;
                            </button>
                        </div>
                    </div>

                    <!-- Video Preview -->
                    <div v-if="videoPreview" class="w-full h-32 overflow-hidden rounded-lg shadow-md mt-4 relative">
                        <video :src="videoPreview" controls class="w-full h-full object-cover"></video>
                        <button
                            @click="clearVideo"
                            class="absolute top-1 right-1 bg-black bg-opacity-50 text-white rounded-full w-6 h-6 flex items-center justify-center cursor-pointer"
                            title="Remove video"
                        >
                            &times;
                        </button>
                    </div>

                    <!-- Reel Preview -->
                    <div v-if="reelPreview" class="w-full h-32 overflow-hidden rounded-lg shadow-md mt-4 relative">
                        <video :src="reelPreview" controls class="w-full h-full object-cover"></video>
                        <button
                            @click="clearReel"
                            class="absolute top-1 right-1 bg-black bg-opacity-50 text-white rounded-full w-6 h-6 flex items-center justify-center cursor-pointer"
                            title="Remove reel"
                        >
                            &times;
                        </button>
                    </div>

                    <div v-if="uploading" class="w-full bg-gray-200 h-2 mb-4">
                        <div :style="{ width: uploadProgress + '%' }" class="bg-blue-600 h-full"></div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center mt-4">
                        <button
                            @click="clearAll"
                            type="button"
                            class="px-4 py-2 bg-white hover:bg-gray-500 text-black rounded-lg shadow-sm text-sm font-medium"
                        >
                            Clear All
                        </button>
                        <button
                            @click="submitPost"
                            type="button"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-sm text-sm font-medium transition-all"
                        >
                            Post
                        </button>
                    </div>
                </div>

                <!--- POST Area--->
                <div
                    v-for="post in followingPosts"
                    :key="post.id"
                    class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2"
                >
                    <!-- Post Header -->
                    <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                        <img
                            :src="post.vlogger.profile_picture ?? '/storage/noimage.jpg'"
                            class="w-9 h-9 rounded-full"
                        />
                        <div class="flex-1">
                            <h4 class="text-black dark:text-white">{{ post.vlogger.name }}</h4>
                            <div
                                class="text-xs text-gray-500 dark:text-white/80"
                            >{{ new Date(post.created_at).toLocaleDateString("en-GB", {
                                  day: "2-digit",
                                  month: "long",
                                  year: "numeric",
                                }) }}</div>
                        </div>
                    </div>

                    <!-- Post Caption -->
                    <div class="px-4 py-2 text-gray-700 dark:text-white/80" v-if="post.caption">
                        {{ post.caption }}
                    </div>

                    <!-- Media Grid -->
                    <div :class="['grid gap-4',post.media.every((item) => item.media_type === 'photo') ? 'grid-cols-3' : '',]" >
                        <div v-for="mediaItem in post.media" :key="mediaItem.id" class="overflow-hidden rounded-md">
                            <img
                                v-if="mediaItem.media_type === 'photo'"
                                :src="`/storage/${mediaItem.file_path}`"
                                alt="Photo"
                                class="object-cover w-full h-full"
                            />
                            <video
                                v-else-if="mediaItem.media_type === 'video'"
                                controls
                                class="object-cover w-full h-full"
                            >
                                <source :src="`/storage/${mediaItem.file_path}`" type="video/mp4" />
                            </video>
                            <video
                                v-else-if="mediaItem.media_type === 'reel'"
                                controls
                                muted
                                loop
                                autoplay
                                class="object-cover w-full h-full"
                            >
                                <source :src="`/storage/${mediaItem.file_path}`" type="video/mp4" />
                            </video>
                        </div>
                    </div>

                    <!-- Post Footer (like, comment, flower toggle) -->
                    <div
                        class="sm:p-4 p-3 flex items-center gap-6 text-sm font-medium border-t border-gray-200 dark:border-gray-700"
                    >
                        <!-- Likes -->
                        <div
                            class="flex items-center gap-2 cursor-pointer group transition-colors duration-200"
                        >
                            <button
                                class="button__ico text-blue-600 bg-blue-100 rounded-full p-2 group-hover:bg-blue-200 dark:bg-slate-700 dark:text-blue-400 dark:group-hover:bg-blue-800"
                                aria-label="Like"
                                title="Like"
                            >
                                <i class="fas fa-thumbs-up text-base"></i>
                            </button>
                            <span class="text-gray-700 dark:text-gray-300">0</span>
                        </div>

                        <!-- Views -->
                        <div class="flex items-center gap-2 cursor-default">
                            <button
                                class="button__ico bg-gray-200 rounded-full p-2 text-gray-700 dark:bg-slate-700 dark:text-gray-400"
                                aria-label="Views"
                                title="Views"
                                disabled
                            >
                                <i class="fas fa-eye text-base"></i>
                            </button>
                            <span class="text-gray-700 dark:text-gray-300">0</span>
                        </div>

                        <!-- Toggle Comments -->
                        <button
                            @click="toggleComments(post.id)"
                            :class="[
                                  'ml-auto font-semibold transition-colors duration-200 px-3 py-1 rounded',
                                  openComments[post.id]
                                    ? 'bg-blue-600 text-white dark:bg-blue-500'
                                    : 'text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500',
                                ]"
                        >
                            Comments
                        </button>

                        <!-- Toggle Gifts -->
                        <button
                            @click="toggleGifts(post.id)"
                            :class="[
                                  'font-semibold transition-colors duration-200 px-3 py-1 rounded',
                                  openGifts[post.id]
                                    ? 'bg-pink-600 text-white dark:bg-pink-500'
                                    : 'text-pink-600 dark:text-pink-400 hover:text-pink-700 dark:hover:text-pink-500',
                                ]"  >
                            Send Gift
                        </button>
                    </div>

                    <hr />

                    <!-- Comments Box -->
                    <div v-if="openComments[post.id]" class="px-4 py-3 space-y-6 bg-white dark:bg-slate-900 rounded-lg shadow-sm">
                        <!-- Single Comment (Static Example) -->
                        <div class="flex gap-3" v-for="postComment in post.comments" :key="postComment.id">

                            <img
                                :src="'/storage/noimage.jpg'"
                                alt="User Avatar"
                                class="w-10 h-10 rounded-full object-cover border-2 border-blue-500"
                            />
                            <div class="flex-1">
                                <div class="font-semibold text-sm text-gray-900 dark:text-white">
                                    {{ postComment.vlogger?.name }}
                                </div>
                                <div class="text-sm text-gray-700 dark:text-gray-300 mt-0.5">
                                    {{ postComment.comment }}
                                </div>
                                <div class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                                    {{ new Date(postComment?.created_at).toLocaleDateString('en-GB', {
                                        day: '2-digit',
                                        month: 'long',
                                        year: 'numeric'
                                      }) }}
                                </div>
                            </div>
                        </div>


                        <!-- Add Comment Input -->
                        <div>
                            <input
                                v-model="newComment[post.id]"
                                type="text"
                                placeholder="Add a comment..."
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-800 dark:border-gray-600 dark:text-white"
                            />
                            <button
                                @click="postComment(post.id)"
                                class="w-full mt-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed transition"
                                :disabled="!newComment[post.id] || newComment[post.id].trim() === ''"
                            >
                                Post Comment
                            </button>
                        </div>
                    </div>

                    <!-- Gift Box -->
                    <div
                        v-if="openGifts[post.id]"
                        class="px-4 py-3 bg-white dark:bg-slate-900 rounded-lg shadow-sm mt-4"
                    >
                        <div class="flex items-center gap-2 select-none mb-3">
                            <template v-for="flowerIndex in 5" :key="flowerIndex">
                                <button
                                    @click="sendGifts(post.id, flowerIndex)"
                                    @mouseover="hoverRatings[post.id] = flowerIndex"
                                    @mouseleave="hoverRatings[post.id] = 0"
                                    :class="[
              'text-4xl transition-colors duration-200',
              (hoverRatings[post.id] >= flowerIndex || flowerRatings[post.id] >= flowerIndex)
                ? 'text-pink-500'
                : 'text-gray-300 dark:text-gray-600',
            ]"
                                    aria-label="Send Gift"
                                    type="button"
                                >
                                    🌸
                                </button>
                            </template>
                        </div>

                        <div class="flex items-center gap-3">
                            <button
                                @click="increaseGifts(post.id)"
                                class="py-2 px-4 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition"
                            >
                                Add More Gifts
                            </button>
                            <span class="text-gray-700 dark:text-gray-400">
                             Total Gifts Sent: {{ flowerRatings[post.id] || 0 }}
                            </span>
                        </div>
                    </div>
                </div>



                <!-- placeholder -->
                <div class="rounded-xl shadow-sm p-4 space-y-4 bg-slate-200/40 animate-pulse border1 dark:bg-dark2">

                    <div class="flex gap-3">
                        <div class="w-9 h-9 rounded-full bg-slate-300/20"></div>
                        <div class="flex-1 space-y-3">
                            <div class="w-40 h-5 rounded-md bg-slate-300/20"></div>
                            <div class="w-24 h-4 rounded-md bg-slate-300/20"></div>
                        </div>
                        <div class="w-6 h-6 rounded-full bg-slate-300/20"></div>
                    </div>

                    <div class="w-full h-52 rounded-lg bg-slate-300/10 my-3"> </div>

                    <div class="flex gap-3">

                        <div class="w-16 h-5 rounded-md bg-slate-300/20"></div>

                        <div class="w-14 h-5 rounded-md bg-slate-300/20"></div>

                        <div class="w-6 h-6 rounded-full bg-slate-300/20 ml-auto"></div>
                        <div class="w-6 h-6 rounded-full bg-slate-300/20  "></div>
                    </div>

                </div>
            </div>
            <!-- right sidebar -->
            <div class="lg:max-w-[370px] md:max-w-[510px] mx-auto">

                <div class="xl:space-y-6 space-y-3 md:pb-12"  uk-sticky="end: #js-oversized; offset: 50; media:992">

                    <!-- peaple you might know -->
                    <div class="bg-white rounded-xl shadow-sm p-5 px-6 border1 dark:bg-dark2">

                        <div class="flex justify-between text-black dark:text-white">
                            <h3 class="font-bold text-base">People You Might Know</h3>
                            <button type="button" @click="fetchSuggestedUsers">
                                <ion-icon name="sync-outline" class="text-xs"></ion-icon>
                            </button>
                        </div>

                        <div class="space-y-4 capitalize text-xs font-normal mt-5 mb-2 text-gray-500 dark:text-white/80">
                            <div v-for="user in suggestedUsers" :key="user.id" class="flex items-center gap-3">
                                <a :href="'/profile/' + user.id">
                                    <img :src="'/storage/' + user.profile_picture" @error="$event.target.src = '/storage/noimage.jpg'" alt="" class="bg-gray-200 rounded-full w-10 h-10">
                                </a>
                                <div class="flex-1">
                                    <a :href="'/profile/' + user.id">
                                        <h4 class="font-semibold text-sm text-black dark:text-white">{{ user.name }}</h4>
                                    </a>
                                    <div class="mt-0.5">Suggested For You</div>
                                </div>
                                <button
                                    type="button"
                                    class="text-sm rounded-full py-1.5 px-4 font-semibold"
                                    :class="user.followed ? 'bg-red-500 text-white' : 'bg-secondery text-black'"
                                    @click="followUser(user.id)"
                                >
                                    {{ user.followed ? 'Unfollow' : 'Follow' }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

    </div>
                <audio ref="followSound" src="https://pos.rexmoo.com/vendor/beep-06.wav" preload="auto"></audio>
        @endverbatim

</main>
@endsection
@section('js')
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    auth: {{\Auth::guard('vlogger')->user()->level}},
                    suggestedUsers: [],
                    followingPosts: [],
                    followList: [],
                    taggedUsers: [],
                    showTagDropdown: false,
                    caption: "",
                    photoFiles: [],
                    photoPreviews: [],
                    video: null,
                    reel: null,
                    videoPreview: null,
                    reelPreview: null,
                    isPhotoSelected: false,
                    isVideoSelected: false,
                    isReelSelected: false,
                    uploading: false,
                    uploadProgress: 0,
                    newComment: {},
                    openComments: {},
                    openGifts: {},
                    flowerRatings: {},
                    hoverRatings: {},
                };
            },
            methods: {
                async fetchSuggestedUsers() {
                    try {
                        const response = await axios.get('/suggested-users');
                        this.suggestedUsers = response.data;
                    } catch (error) {
                        console.error('Error fetching suggested users:', error);
                    }
                },
                async followUser(userId) {
                    const user = this.suggestedUsers.find(u => u.id === userId);
                    if (!user) return;
                    try {
                        if (!user.followed) {
                            await axios.post(`/follow/${userId}`);
                            user.followed = true;
                            this.$refs.followSound.play();
                        } else {
                            await axios.post(`/unfollow/${userId}`);
                            user.followed = false;
                            this.$refs.followSound.play();
                        }
                    } catch (error) {
                        console.error('Error following/unfollowing user:', error);
                    }
                },
                async fetchFollowingPosts() {
                    try {
                        const response = await axios.get('/followings/posts');
                        this.followingPosts = response.data;
                    } catch (error) {
                        console.error('Error fetching following posts:', error);
                    }
                },
                async fetchFollowList() {
                    try {
                        const response = await axios.get('/my-following');
                        this.followList = response.data;
                    } catch (error) {
                        console.error('Error fetching follow list:', error);
                    }
                },
                handleFileChange(type) {
                    const fileInput = this.$refs[type];
                    const files = Array.from(fileInput.files);

                    // Clear other inputs
                    this.clearOtherInputs(type);

                    if (type === 'photo') {
                        this.photoFiles = files;
                        this.photoPreviews = files.map(file => URL.createObjectURL(file));
                        this.isPhotoSelected = true;
                    } else if (type === 'video') {
                        this.video = files[0];
                        this.videoPreview = URL.createObjectURL(files[0]);
                        this.isVideoSelected = true;
                    } else if (type === 'reel') {
                        this.reel = files[0];
                        this.reelPreview = URL.createObjectURL(files[0]);
                        this.isReelSelected = true;
                    }
                },
                clearOtherInputs(selectedType) {
                    const types = ['photo', 'video', 'reel'];
                    types.forEach((type) => {
                        if (type !== selectedType) {
                            // Check if ref exists before resetting value
                            if (this.$refs[type]) {
                                this.$refs[type].value = '';
                            }
                            this[`is${type.charAt(0).toUpperCase() + type.slice(1)}Selected`] = false;
                            this[`${type}Preview`] = null;
                            if (type === 'photo') {
                                this.photoFiles = [];
                                this.photoPreviews = [];
                            } else {
                                this[type] = null;
                            }
                        }
                    });
                },
                clearAll() {
                    this.caption = '';
                    this.taggedUsers = [];
                    this.photoFiles = [];
                    this.photoPreviews = [];
                    this.video = null;
                    this.videoPreview = null;
                    this.reel = null;
                    this.reelPreview = null;
                    this.isPhotoSelected = false;
                    this.isVideoSelected = false;
                    this.isReelSelected = false;
                    this.uploading = false;
                    this.uploadProgress = 0;
                    this.$refs.photo.value = '';
                    this.$refs.video.value = '';
                    this.$refs.reel.value = '';
                },
                submitPost() {
                    const formData = new FormData();
                    formData.append('caption', this.caption);

                    if (this.photoFiles.length > 0) {
                        formData.append('content_type', 'photo');
                        this.photoFiles.forEach((file, index) => {
                            formData.append(`content_files[${index}]`, file);
                        });
                    } else if (this.video) {
                        formData.append('content_type', 'video');
                        formData.append('content_files[0]', this.video);
                    } else if (this.reel) {
                        formData.append('content_type', 'reel');
                        formData.append('content_files[0]', this.reel);
                    }

                    this.taggedUsers.forEach(user => {
                        formData.append('tagged_users[]', user.id);
                    });

                    this.uploading = true;
                    this.uploadProgress = 0;

                    axios.post('/posts', formData, {
                        onUploadProgress: (progressEvent) => {
                            if (progressEvent.total) {
                                this.uploadProgress = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                            }
                        }
                    })
                        .then(response => {
                            alert('Post created successfully!');
                            this.clearAll();
                        })
                        .catch(error => {
                            alert('An error occurred while creating the post.');
                            console.error(error);
                        })
                        .finally(() => {
                            this.uploading = false;
                        });
                },


                toggleComments(postId) {
                    this.openComments = { ...this.openComments, [postId]: !this.openComments[postId] };
                    if (this.openGifts[postId]) {
                        this.openGifts = { ...this.openGifts, [postId]: false };
                    }
                },
                toggleGifts(postId) {
                    this.openGifts = { ...this.openGifts, [postId]: !this.openGifts[postId] };
                    if (this.openComments[postId]) {
                        this.openComments = { ...this.openComments, [postId]: false };
                    }
                },
                async postComment(postId) {
                    const comment = this.newComment[postId];
                    if (!comment || comment.trim() === '') return;

                    try {
                        const response = await axios.post(`/posts/${postId}/comments`, {
                            comment: comment.trim(),
                        });
                        // Optionally push to local comments list or refetch
                        if (!this.comments[postId]) this.$set(this.comments, postId, []);
                        this.comments[postId].push(response.data.comment);
                        this.newComment = { ...this.newComment, [postId]: '' };
                    } catch (error) {
                        console.error('Failed to post comment:', error);
                        alert('Failed to post comment. Please try again.');
                    }
                },
                sendGifts(postId, value) {
                    this.flowerRatings = { ...this.flowerRatings, [postId]: value };
                },
                increaseGifts(postId) {
                    if (!this.flowerRatings[postId]) {
                        this.flowerRatings[postId] = 1;
                    } else {
                        this.flowerRatings[postId] += 1;
                    }
                },

            },
            mounted() {
                this.fetchSuggestedUsers();
                this.fetchFollowingPosts();
                this.fetchFollowList();
            }
        }).mount('#app');
    </script>
@endsection
