package com.example.larry.faregas.net.request;

/**
 * Created by BillyCaballero on 11/12/15.
 */
public class LoginRequest {

    private String code;
    private String password;

    public LoginRequest(String code, String password) {
        this.code = code;
        this.password = password;
    }
}
