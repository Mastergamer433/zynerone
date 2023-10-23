pub mod system;

use rocket::Rocket;
use rocket::Build;
use crate::route_url;

pub fn routes(rocket: Rocket<Build>, base_url: &str) -> Rocket<Build> {
    system::routes(rocket, route_url!(base_url, "/v1"))
}
