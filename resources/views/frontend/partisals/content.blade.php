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
                <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
                    <div class="space-y-6">
                        <!-- Caption Input -->
                        <div class="space-y-2">
                            <label for="caption" class="block text-lg font-semibold">Caption</label>
                            <textarea v-model="caption" id="caption" placeholder="Enter your caption" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                        </div>

                        <!-- File Inputs for Photo, Video, and Reel -->
                        <div class="flex space-x-4">
                            <label :class="{'cursor-pointer bg-gray-100': !isPhotoSelected}" class="flex flex-col items-center justify-center w-1/4 p-2 rounded-lg border border-blue-500 text-blue-600 hover:bg-blue-200">
                                <span class="text-sm">Photo</span>
                                <input type="file" ref="photo" accept="image/*" @change="handleFileChange('photo')" class="hidden" />
                            </label>

                            <label :class="{'cursor-pointer bg-gray-100': !isVideoSelected}" class="flex flex-col items-center justify-center w-1/4 p-2 rounded-lg border border-green-500 text-green-600 hover:bg-green-200">
                                <span class="text-sm">Video</span>
                                <input type="file" ref="video" accept="video/*" @change="handleFileChange('video')" class="hidden" />
                            </label>

                            <label :class="{'cursor-pointer bg-gray-100': !isReelSelected}" class="flex flex-col items-center justify-center w-1/4 p-2 rounded-lg border border-pink-500 text-pink-600 hover:bg-pink-200">
                                <span class="text-sm">Reel</span>
                                <input type="file" ref="reel" accept="video/*" @change="handleFileChange('reel')" class="hidden" />
                            </label>
                        </div>

                        <!-- Preview Grid (with responsive columns) -->
                        <div v-if="photoPreview || videoPreview || reelPreview" class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4">
                            <div v-if="photoPreview" class="w-full h-32 overflow-hidden rounded-lg shadow-md">
                                <img :src="photoPreview" alt="Photo Preview" class="w-full h-full object-cover" />
                            </div>
                            <div v-if="videoPreview" class="w-full h-32 overflow-hidden rounded-lg shadow-md">
                                <video :src="videoPreview" controls class="w-full h-full object-cover"></video>
                            </div>
                            <div v-if="reelPreview" class="w-full h-32 overflow-hidden rounded-lg shadow-md">
                                <video :src="reelPreview" controls class="w-full h-full object-cover"></video>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between items-center mt-4">
                            <button @click="clearAll" type="button" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg shadow-sm text-sm font-medium">Clear All</button>
                            <button @click="submitPost" type="button" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-sm text-sm font-medium transition-all">Post</button>
                        </div>
                    </div>
                </div>

                <div v-for="post in followingPosts" :key="post.id" class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                    <!-- Post Header -->
                    <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                        <img :src="post.vlogger.profile_picture ??  '/storage/noimage.jpg'" class="w-9 h-9 rounded-full" />
                        <div class="flex-1">
                            <h4 class="text-black dark:text-white">{{ post.vlogger.name }}</h4>
                            <div class="text-xs text-gray-500 dark:text-white/80">
                                {{ new Date(post.created_at).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'long',
                                    year: 'numeric'
                                }) }}
                            </div>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="relative w-full lg:h-72 h-full sm:px-4">
                        <img v-if="post.content_type === 'photo'" :src="'/storage/' + post.content_file" @error="$event.target.src = '/storage/noimage.jpg'" class="sm:rounded-lg w-full h-full object-cover" />
                        <video v-else-if="post.content_type === 'video'" controls class="sm:rounded-lg w-full h-full object-cover">
                            <source :src="'/storage/' + post.content_file" type="video/mp4">
                        </video>
                        <video v-else-if="post.content_type === 'reel'" controls muted loop autoplay class="sm:rounded-lg w-full h-full object-cover">
                            <source :src="'/storage/' + post.content_file" type="video/mp4">
                        </video>
                    </div>

                    <!-- Post Caption -->
                    <div class="px-4 py-2 text-gray-700 dark:text-white/80" v-if="post.caption">
                        {{ post.caption }}
                    </div>

                    <!-- Post Footer (like, comment...) -->
                    <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                        <div class="flex items-center gap-2.5">
                            <button class="button__ico text-red-500 bg-red-100 dark:bg-slate-700">
                                <ion-icon class="text-lg" name="heart"></ion-icon>
                            </button>
                            <span>0</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="button__ico bg-slate-200/70 dark:bg-slate-700">
                                <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon>
                            </button>
                            <span>0</span>
                        </div>
                        <button class="button__ico ml-auto">
                            <ion-icon class="text-xl" name="paper-plane-outline"></ion-icon>
                        </button>
                        <button class="button__ico">
                            <ion-icon class="text-xl" name="share-outline"></ion-icon>
                        </button>
                    </div>

                    <hr>

                    <!-- Comments Section -->
                    <div class="px-4 py-2 space-y-4">
                        <div  class="flex gap-3">
                            <img :src="'/storage/noimage.jpg'" class="w-8 h-8 rounded-full" />
                            <div class="flex-1">
                                <div class="font-semibold text-sm">usr</div>
                                <div class="text-sm text-gray-700 dark:text-white/80">Khub valo hoice</div>
                                <div class="text-xs text-gray-500 dark:text-white/80">12 may 2025</div>
                            </div>
                        </div>


                        <!-- Add Comment Input -->
                        <div class="mt-4">
                            <input
                                v-model="newComment"
                                type="text"
                                placeholder="Add a comment..."
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            />
                            <button   class="w-full mt-2 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Post Comment
                            </button>
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
                                <ion-icon name="sync-outline" class="text-xl"></ion-icon>
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
    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    suggestedUsers: [] ,
                    followingPosts: [],
                    caption: "",
                    photo: null,
                    video: null,
                    reel: null,
                    photoPreview: null,
                    videoPreview: null,
                    reelPreview: null,
                    isPhotoSelected: false,
                    isVideoSelected: false,
                    isReelSelected: false,
                }
            },
            methods: {
                // Fetch suggested users from the API
                async fetchSuggestedUsers() {
                    try {
                        const response = await axios.get('/suggested-users');
                        this.suggestedUsers = response.data;

                        console.log('user',response.data)
                    } catch (error) {
                        console.error('Error fetching suggested users:', error);
                    }
                },

                // Follow a suggested user
                async followUser(userId) {
                    const user = this.suggestedUsers.find(u => u.id === userId);
                    if (!user) return;

                    try {
                        if (!user.followed) {
                            await axios.post(`/follow/${userId}`);
                            user.followed = true;

                            // Play follow sound
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
                        console.log('Posts from followed users:', response.data);
                    } catch (error) {
                        console.error('Error fetching following posts:', error);
                    }
                },

                handleFileChange(type) {
                    const fileInput = this.$refs[type];
                    const file = fileInput.files[0];

                    // If a file is selected, handle it
                    if (file) {
                        // Clear other inputs and previews
                        this.clearOtherInputs(type);

                        // Handle the selected file type
                        if (type === 'photo') {
                            this.photo = file;
                            this.photoPreview = URL.createObjectURL(file);
                            this.isPhotoSelected = true;
                        } else if (type === 'video') {
                            this.video = file;
                            this.videoPreview = URL.createObjectURL(file);
                            this.isVideoSelected = true;
                        } else if (type === 'reel') {
                            this.reel = file;
                            this.reelPreview = URL.createObjectURL(file);
                            this.isReelSelected = true;
                        }
                    }
                },

                clearOtherInputs(selectedType) {
                    const types = ['photo', 'video', 'reel'];
                    types.forEach((type) => {
                        if (type !== selectedType) {
                            // Clear file input and reset selection state
                            this.$refs[type].value = '';
                            this[`is${type.charAt(0).toUpperCase() + type.slice(1)}Selected`] = false;
                            this[`${type}Preview`] = null; // Reset the preview
                        }
                    });
                },

                clearAll() {
                    this.caption = '';
                    this.photo = null;
                    this.video = null;
                    this.reel = null;
                    this.photoPreview = null;
                    this.videoPreview = null;
                    this.reelPreview = null;
                    this.isPhotoSelected = false;
                    this.isVideoSelected = false;
                    this.isReelSelected = false;
                    this.$refs.photo.value = '';
                    this.$refs.video.value = '';
                    this.$refs.reel.value = '';
                },

                submitPost() {
                    const formData = new FormData();
                    formData.append('caption', this.caption);

                    // Determine selected type and file
                    if (this.photo) {
                        formData.append('content_type', 'photo');
                        formData.append('content_file', this.photo);
                    } else if (this.video) {
                        formData.append('content_type', 'video');
                        formData.append('content_file', this.video);
                    } else if (this.reel) {
                        formData.append('content_type', 'reel');
                        formData.append('content_file', this.reel);
                    }
                    axios.post('/posts', formData)
                        .then(response => {
                            alert('Post created successfully!');
                            this.clearAll(); // Reset the form
                        })
                        .catch(error => {
                            alert('An error occurred while creating the post.');
                            console.error(error);
                        });
                }
            },
            mounted() {
                this.fetchSuggestedUsers();
                this.fetchFollowingPosts();
            }
        }).mount('#app');
    </script>

@endsection
