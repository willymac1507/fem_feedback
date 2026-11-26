export type Request = {
    id: number,
    title: string,
    category: string,
    description: string,
    status: string,
    upvote: number,
    comments_count: number,
    comments?: Comment[]
}

export type Comment = {
    id: number,
    content: string,
    request_id: number,
    user: User
    user_id: number,
    replyTo?: string,
    replies?: Comment[]
}

export type User = {
    id: number,
    name: string,
    email: string,
    username: string,
    image: string,
}

