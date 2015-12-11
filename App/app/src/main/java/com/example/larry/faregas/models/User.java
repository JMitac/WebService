package com.example.larry.faregas.models;

/**
 * Created by Larry on 25/11/2015.
 */
public class User {
    private String name;
    private String avatar;

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getAvatar() {
        return avatar;
    }

    public void setAvatar(String avatar) {
        this.avatar = avatar;
    }

    public User(String name, String avatar) {

        this.name = name;
        this.avatar = avatar;
    }
}
