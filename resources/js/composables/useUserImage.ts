import type {User} from "@/types/data";

const images = import.meta.glob('/resources/js/assets/user-images/*.jpg', {
    import: 'default',
    eager: true,
})

export function getImage(user: User): any {
    const firstName = user.name.split(' ')[0].toLowerCase()
    return images[`/resources/js/assets/user-images/image-${firstName}.jpg`]
}
