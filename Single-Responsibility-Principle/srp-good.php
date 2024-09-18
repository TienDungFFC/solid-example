<?php

// tiếp nhận data và điều phối thông tin
class UserRegistration
{
    protected $passwordHasher;
    protected $userRepository;
    protected $emailService;
    protected $userValidator;

    public function __construct(PasswordHasher $passwordHasher, UserRepository $userRepository, EmailService $emailService, UserValidator $userValidator)
    {
        $this->passwordHasher = $passwordHasher;
        $this->userRepository = $userRepository;
        $this->emailService = $emailService;
        $this->userValidator = $userValidator;
    }

    public function register($userData)
    {
        $this->userValidator->validate($userData);
        $userData['password'] = $this->passwordHasher->hash($userData['password']);
        $this->userRepository->save($userData);
        $this->emailService->sendWelcomeEmail($userData['email']);
    }
}

// Chịu trách nhiệm validata data user
class UserValidator {
    public function validate($userData) {
        if (empty($userData)) {
            throw new Exception("Invali data");
        } 
    }
}

// Mã hoá password
class PasswordHasher {
    public function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

// lưu, sửa, xoá thông tin user vào db
class UserRepository {
    public function createUser($userData) {
        $user = new UserModel();
        $user->name = $userData['name'];
        $user->email =  $userData['email'];
        $user->password = $userData['password'];
        $user->save();
    }
}

// gửi email
class EmailService {
    public function sendEmail($email) {
        mail($email, "Registering succesful", 'Thanks for registering!');
    }
}
