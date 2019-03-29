<script>
    const VIDEO = '{{ \App\Modules\Challenges\Enums\ProofTypeEnum::VIDEO }}',
          MULTIPLE_VIDEOS = '{{ \App\Modules\Challenges\Enums\ProofTypeEnum::MULTIPLE_VIDEOS }}',
          REQUIRED_VIDEO_DURATION = [
              VIDEO,
              MULTIPLE_VIDEOS
          ],
          CHALLENGE_LOGO_SIGN = '{{ \App\Modules\Files\Enums\FileSignTypeEnum::CHALLENGE_LOGO }}',
          COMPANY_LOGO_SIGN = '{{ \App\Modules\Files\Enums\FileSignTypeEnum::COMPANY_LOGO }}',
          CHALLENGE_LOGO_MAX_SIZE = '{{ config('custom.challenge_logo_max_size') }}',
          COMPANY_LOGO_MAX_SIZE = '{{ config('custom.company_logo_max_size') }}';
</script>