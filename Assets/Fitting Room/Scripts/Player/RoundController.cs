using System;
using UnityEngine;

namespace Fitting_Room
{
    public class RoundController : MonoBehaviour
    {
        [Header("V1")]
        [SerializeField] private CapsuleCollider[] capCollidersV1;
        [SerializeField] private SphereCollider[] sphereColliderV1;
        [SerializeField] private float defaultV1;
        
        [Header("V2")]
        [SerializeField] private CapsuleCollider[] capCollidersV2;
        [SerializeField] private SphereCollider[] sphereColliderV2;
        [SerializeField] private float defaultV2;
        
        [Header("V3")]
        [SerializeField] private CapsuleCollider[] capCollidersV3;
        [SerializeField] private SphereCollider[] sphereColliderV3;
        [SerializeField] private float defaultV3;

        public void ChangeV1(float newVal)
        {
            ChangeV(capCollidersV1, sphereColliderV1, defaultV1, newVal);
        }

        public void ChangeV2(float newVal)
        {
            ChangeV(capCollidersV2, sphereColliderV2, defaultV2, newVal);
        }

        public void ChangeV3(float newVal)
        {
            ChangeV(capCollidersV3, sphereColliderV3, defaultV3, newVal);
        }
        
        private void ChangeV(CapsuleCollider[] capsuleColliders, SphereCollider[] sphereColliders, float defaultVal, float newVal)
        {
            foreach (var capsuleCollider in capsuleColliders)
            {
                var curRad = capsuleCollider.radius;

                var newRad = curRad / defaultVal * newVal;

                capsuleCollider.radius = newRad;
            }
            
            foreach (var sphereCollider in sphereColliders)
            {
                var curRad = sphereCollider.radius;

                var newRad = curRad / defaultVal * newVal;

                sphereCollider.radius = newRad;
            }
        }
    }
}