package com.example.larry.faregas.servicies;

import com.example.larry.faregas.models.User;

import retrofit.Call;
import retrofit.http.GET;
import retrofit.http.Path;

/**
 * Created by Larry on 25/11/2015.
 */
public interface GitHubService {
    @GET("/users/{user}/repos")
    Call<User> listRepos(@Path("user") String user);
}
